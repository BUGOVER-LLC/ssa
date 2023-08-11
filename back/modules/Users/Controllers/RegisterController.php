<?php

declare(strict_types=1);

namespace Modules\Users\Controllers;

use App\Http\Controller;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Modules\Users\Models\User;
use Modules\Users\Requests\RegisterRequest;
use RuntimeException;

use function in_array;

class RegisterController extends Controller
{
    /**
     * @param User $user
     */
    public function __construct(private readonly User $user)
    {
    }

    /**
     * Store a new user.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $request_data = $request->validated();
        $insert_data = [];

        foreach ($request_data as $item => $value) {
            if (in_array($item, $this->user->getFillable(), true)) {
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

        // Final Response
        return $this->response(['message' => __('general_words.process_success')], 201);
    }
}
