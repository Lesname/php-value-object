<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Exception;

use LessValueObject\Exception\AbstractException;
use LessValueObject\String\Format\StringFormatValueObject;

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
