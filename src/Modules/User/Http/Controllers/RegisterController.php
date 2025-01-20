<?php

declare(strict_types=1);

namespace Module\User\Http\Controllers;

use Illuminate\Support\Str;
use Infrastructure\Http\Controller;
use Infrastructure\Utils\SendEmail;
use Module\User\Http\Requests\RegisterRequest;
use Module\User\Http\Resource\UserRegisterResource;
use Module\User\Service\QueryService;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

final class RegisterController extends Controller
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
     * @return UserRegisterResource
     * @throws TransportExceptionInterface
     */
    public function __invoke(RegisterRequest $request): UserRegisterResource
    {
        $user = $this->query->createUser($request->toDto());
        $code = Str::random(6);

//        $this->sendEmail
//            ->from('cewfewf@mail.com')
//            ->to($user->getEmail())
//            ->html("<p>$code</p>")
//            ->subject('Accept Code')
//            ->send();

        return new UserRegisterResource($user);
    }
}
