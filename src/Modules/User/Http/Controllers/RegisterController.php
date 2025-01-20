<?php

declare(strict_types=1);

namespace Module\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Infrastructure\Http\Controller;
use Infrastructure\Utils\SendEmail;
use Module\User\Http\Requests\RegisterRequest;
use Module\User\Service\QueryService;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class RegisterController extends Controller
{
    /**
     * @param QueryService $query
     * @param SendEmail $sendEmail
     */
    public function __construct(private readonly QueryService $query, private readonly SendEmail $sendEmail)
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
        $user = $this->query->createUser($request->toDto());
        $code = Str::random(6);

        $this->sendEmail
            ->from('cewfewf@mail.com')
            ->to($user->getEmail())
            ->html("<p>$code</p>")
            ->subject('Accept Code')
            ->send();

        return $this->response(['message' => __('general_words.process_success')], 201);
    }
}
