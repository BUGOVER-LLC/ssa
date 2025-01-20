<?php

declare(strict_types=1);

namespace Module\User\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Entity\User;
use Infrastructure\Http\Request\ApiRequest;
use Module\User\DTO\RegisterUserDto;

class RegisterRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return Auth::guest();
    }

    /**
     * The validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:' . User::class . ',email',
            ],
            'password' => [
                'required',
                'between:6,255',
            ],
            'first_name' => [
                'nullable',
                'between:1,20',
            ],
            'last_name' => [
                'nullable',
                'between:1,20',
            ],
            'gender' => [
                'nullable',
                'in:m,f',
            ],
        ];
    }

    /**
     * @return RegisterUserDto
     */
    public function toDto(): RegisterUserDto
    {
        return new RegisterUserDto(
            username: $this->username,
            email: $this->email,
            password: $this->password,
            firstName: $this->first_name,
            lastName: $this->last_name,
        );
    }
}
