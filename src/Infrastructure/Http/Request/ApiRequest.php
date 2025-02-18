<?php

declare(strict_types=1);

namespace Infrastructure\Http\Request;

use Core\Abstract\AbstractRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class ApiRequest extends AbstractRequest
{
    /**
     * @var Container|null
     */
    protected ?Container $app = null;

    /**
     * @var Validator|null
     */
    protected ?Validator $validator = null;

    /**
     * @return array
     */
    public function validated(): array
    {
        $this->handler();

        return $this->validator->validated();
    }

    private function handler()
    {
        if (!$this->validator) {
            $this->validate();
        }
    }

    /**
     * @return void
     * @throws BindingResolutionException
     */
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

    /**
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    protected function failedAuthorization(): void
    {
        throw new AuthorizationException();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        // no default action
    }

    /**
     * @return array
     */
    protected function attributes(): array
    {
        return [];
    }

    /**
     * @return void
     */
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

    /**
     * @return void
     */
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
