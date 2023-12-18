<?php
declare(strict_types=1);

namespace LessValueObject\String;

use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;

/**
 * @psalm-immutable
 */
abstract class AbstractStringValueObject implements StringValueObject
{
    /**
     * @throws TooShort
     * @throws TooLong
     */
    public function __construct(private readonly string $string)
    {
        $length = static::getStringLength($string);

        if ($length < static::getMinimumLength()) {
            throw new TooShort(static::getMinimumLength(), $length);
        }

        if ($length > static::getMaximumLength()) {
            throw new TooLong(static::getMaximumLength(), $length);
        }
    }

    /**
     * @psalm-pure
     */
    protected static function getStringLength(string $input): int
    {
        $length = grapheme_strlen($input);

        return is_int($length)
            ? $length
            : strlen($input);
    }

    public function getValue(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    public function jsonSerialize(): string
    {
        return $this->string;
    }
}
