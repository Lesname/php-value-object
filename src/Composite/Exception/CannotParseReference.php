<?php
declare(strict_types=1);

namespace LessValueObject\Composite\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class CannotParseReference extends AbstractException
{
    public function __construct(public string $given)
    {
        parent::__construct("Cannot parse '{$given}' as a reference");
    }
}
