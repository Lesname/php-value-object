<?php
declare(strict_types=1);

namespace LessValueObject\Composite\Exception;

use LessValueObject\Exception\AbstractValueObjectException;

/**
 * @psalm-immutable
 */
final class CannotParseReference extends AbstractValueObjectException
{
    public function __construct(public string $given)
    {
        parent::__construct("Cannot parse '{$given}' as a reference");
    }
}
