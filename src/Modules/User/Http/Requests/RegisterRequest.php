<?php

declare(strict_types=1);

namespace Module\User\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Infrastructure\Http\Request\ApiRequest;

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
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'min:3', 'max:64', 'unique:users,username'],
            'password' => ['required', 'between:6,255'],
            'first_name' => ['nullable', 'between:1,20'],
            'last_name' => ['nullable', 'between:1,20'],
            'gender' => ['nullable', 'in:m,f']
        ];
    }
}
