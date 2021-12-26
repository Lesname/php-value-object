<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Exception;

use LessValueObject\Exception\AbstractValueObjectException;
use LessValueObject\String\Format\FormattedStringValueObject;

/**
 * @psalm-immutable
 */
final class NotFormat extends AbstractValueObjectException
{
    /**
     * @param class-string<FormattedStringValueObject> $expected
     * @param string $given
     */
    public function __construct(public string $expected, public string $given)
    {
        parent::__construct("Expected '{$expected}', given `{$given}`");
    }
}
