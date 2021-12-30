<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Exception;

use LessValueObject\Exception\AbstractException;
use LessValueObject\String\Format\FormattedStringValueObject;

/**
 * @psalm-immutable
 */
final class NotFormat extends AbstractException
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
