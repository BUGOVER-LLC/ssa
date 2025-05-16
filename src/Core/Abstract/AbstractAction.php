<?php

declare(strict_types=1);

namespace Core\Abstract;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use Pheanstalk\Exception\ServerInternalErrorException;
use Throwable;

/**
 * @method run(...$arguments)
 */
abstract class AbstractAction
{
    /**
     * @param ...$arguments
     * @return mixed
     * @throws ServerInternalErrorException|Throwable
     */
    public function transactionalRun(...$arguments): mixed
    {
        if (0 !== DB::connection(DB::getDefaultConnection())->transactionLevel()) {
            try {
                return $this->run(...$arguments);
            } catch (Throwable $exception) {
                throw new ServerInternalErrorException(
                    message: $exception->getMessage(),
                    previous: $exception->getPrevious(),
                    file: $exception->getFile(),
                    line: $exception->getLine(),
                );
            }
        }

        return DB::transaction(function () use ($arguments) {
            try {
                return static::run(...$arguments);
            } catch (Throwable $exception) {
                throw new ServerInternalErrorException(
                    message: $exception->getMessage(),
                    previous: $exception->getPrevious(),
                    file: $exception->getFile(),
                    line: $exception->getLine(),
                );
            }
        });
    }

    /**
     * Close current transaction
     *
     * @return void
     */
    final protected function closeTransaction(): void
    {
        DB::connection(DB::getDefaultConnection())->unsetTransactionManager();
    }

    /**
     * Close current transaction
     *
     * @return void
     * @throws Throwable
     */
    final protected function commitTransaction(): void
    {
        DB::connection(DB::getDefaultConnection())->commit();
    }

    /**
     * Close current transaction
     *
     * @return void
     * @throws Throwable
     */
    final protected function rollbackTransaction(): void
    {
        DB::connection(DB::getDefaultConnection())->rollBack();
    }

    /**
     * @return Pipeline
     */
    final protected function pipe(): Pipeline
    {
        return new Pipeline(app());
    }
}
