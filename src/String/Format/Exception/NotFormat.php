<?php
declare(strict_types=1);

namespace LesValueObject\String\Format\Exception;

use LesValueObject\Exception\AbstractException;
use LesValueObject\String\Format\StringFormatValueObject;

/**
 * @psalm-immutable
 */
final class NotFormat extends AbstractException
{
    /**
     * @param class-string<StringFormatValueObject> $expected
     */
    public function __construct(public readonly string $expected, public readonly string $given)
    {
        parent::__construct("Expected '{$expected}', given `{$given}`");
    }
}
