<?php

declare(strict_types=1);

namespace Modules\Users\Controllers;

use App\Utils\SendEmail;
use App\Http\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Modules\Users\Models\User;
use Modules\Users\Requests\RegisterRequest;
use RuntimeException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class RegisterController extends Controller
{
    /**
     * @param User $user
     * @param SendEmail $sendEmail
     */
    public function __construct(private readonly User $user, private readonly SendEmail $sendEmail)
    {
    }

    /**
     * Store a new user.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws TransportExceptionInterface
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $request_data = $request->validated();
        $insert_data = [];

        foreach ($request_data as $item => $value) {
            if (\in_array($item, $this->user->getFillable(), true)) {
                $insert_data[$item] = $value;
            }
        }

        if (empty($insert_data)) {
            throw new RuntimeException(__('auth.failed_reg_data'), 502);
        }

        // Save to DB
        try {
            $this->user->create($insert_data);
        } catch (Exception $exception) {
            logging($exception, 'error');
            throw new RuntimeException($exception->getMessage(), 500);
        }

        $user = $this->user->latest()->first();
        $code = Str::random(6);

        $this->sendEmail
            ->from('cewfewf@mail.com')
            ->to($user->email)
            ->html("<p>$code</p>")
            ->subject('Accept Code')
            ->send();

        return $this->response(['message' => __('general_words.process_success')], 201);
    }
}
