<?php
declare(strict_types=1);

namespace LessValueObject\Exception;

use Exception;

/**
 * @psalm-immutable
 *
 * @psalm-suppress MutableDependency base dependency
 */
abstract class AbstractException extends Exception
{
}
