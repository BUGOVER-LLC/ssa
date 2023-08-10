<?php

declare(strict_types=1);

namespace App\Http;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\Request;

abstract class ApiRequest extends Request
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var Validator
     */
    protected $validator;

    public function validated(): array
    {
        return $this->validator->validated();
    }

    public function validate(): void
    {
        if (false === $this->authorize()) {
            $this->failedAuthorization();
        }

        $this->prepareForValidation();

        $this->validator = $this->app->make('validator')
            ->make($this->all(), $this->rules(), $this->messages(), $this->attributes());

        if ($this->validator->fails()) {
            $this->validationFailed();
        }

        $this->validationPassed();
    }

    protected function authorize(): bool
    {
        return true;
    }

    protected function failedAuthorization(): void
    {
        throw new AuthorizationException();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // no default action
    }

    abstract protected function rules(): array;

    protected function messages(): array
    {
        return [];
    }

    protected function attributes(): array
    {
        return [];
    }

    protected function validationFailed(): void
    {
        throw new ValidationException($this->validator, $this->errorResponse());
    }

    /**
     * @return JsonResponse|null
     */
    protected function errorResponse(): ?JsonResponse
    {
        return response()->json([
            'message' => $this->errorMessage(),
            'errors' => $this->validator->errors()->messages(),
        ], $this->statusCode());
    }

    /**
     * @return string
     */
    protected function errorMessage(): string
    {
        return 'The given data was invalid.';
    }

    /**
     * @return int
     */
    protected function statusCode(): int
    {
        return 422;
    }

    protected function validationPassed()
    {
        //
    }

    /**
     * @param $app
     * @return void
     */
    public function setContainer($app): void
    {
        $this->app = $app;
    }
}
