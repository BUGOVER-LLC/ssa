<?php

declare(strict_types=1);

namespace Module\User\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\ApiRequest;

/**
 * @property bool $remember
 * @property string $email
 * @property string $password
 */
class LoginRequest extends ApiRequest
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
            'email' => ['required', 'string', 'max:250', 'min:5', 'exists:users,email'],
            'password' => ['required', 'string', 'max:200', 'min:3'],
            'remember' => ['required', 'bool'],
        ];
    }
}
