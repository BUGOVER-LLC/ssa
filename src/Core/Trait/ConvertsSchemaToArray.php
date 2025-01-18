<?php

declare(strict_types=1);

namespace Core\Trait;

use Core\Abstract\AbstractSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

trait ConvertsSchemaToArray
{
    private static mixed $additionalData;

    public static function schemas(array|Collection $collection): ?array
    {
        return collect($collection)->map(static fn($item) => static::schema($item))->toArray();
    }

    public function toArray($request): array|string
    {
        return $this
            ->toSchema($request)
            ->toArray();
    }

    /**
     * @param Request $request
     * @return AbstractSchema|string
     */
    abstract public function toSchema(Request $request): AbstractSchema|string;

    /**
     * @param $resource
     * @return AbstractSchema|null
     */
    public static function schema($resource): ?AbstractSchema
    {
        return $resource ? (new static($resource))->toSchema(request()) : null;
    }

    /**
     * @param mixed $data
     * @return static|string
     */
    public static function setAdditionalData(mixed $data): static|string
    {
        static::$additionalData = $data;

        return static::class;
    }

    /**
     * @return mixed
     */
    public function getAdditionallData(): mixed
    {
        return static::$additionalData;
    }
}
