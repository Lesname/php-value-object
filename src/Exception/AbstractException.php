<?php

declare(strict_types=1);

namespace LesValueObject\Exception;

use Exception;

/**
 * @psalm-immutable
 *
 * @psalm-suppress MutableDependency base dependency
 * @psalm-suppress ImpureMethodCall base dependency
 */
abstract class AbstractException extends Exception
{
}
