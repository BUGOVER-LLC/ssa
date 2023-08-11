<?php

declare(strict_types=1);

namespace Modules\Users\Controllers;

use App\Http\Controller;
use Exception;
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

        foreach ($request_data as $item) {
            if (!in_array($item, $this->user->getFillable(), true)) {
                throw new RuntimeException("Invalid Data '$item'", 423);
            }
        }

        // Save to DB
        try {
            $this->user->insert($request_data);
        } catch (Exception $exception) {
            throw new RuntimeException('Server Error', 423);
        }

        // Final Response
        return $this->response(['message' => __('general_words.process_success')], 201);
    }
}
