<?php
declare(strict_types=1);

namespace LesValueObject\Composite\Signature\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class PropertyNotFound extends AbstractException
{
    public function __construct(public readonly string $key)
    {
        parent::__construct("Property '{$key}' not found");
    }
}
