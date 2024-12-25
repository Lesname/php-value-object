<?php
declare(strict_types=1);

namespace LessValueObject\Exception;

use Exception;
use Throwable;

/**
 * @psalm-immutable
 *
 * @psalm-suppress MutableDependency base dependency
 * @psalm-suppress ImpureMethodCall base dependency
 */
abstract class AbstractException extends Exception
{
    /**
     * @psalm-pure
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
