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
     *
     * @psalm-pure
     */
    public function __construct(public readonly string $value)
    {
        $length = static::getStringLength($value);

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

    /**
     * @deprecated
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
