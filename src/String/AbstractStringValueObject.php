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
        $length = mb_strlen($string);

        if ($length < static::getMinLength()) {
            throw new TooShort(static::getMinLength(), $length);
        }

        if ($length > static::getMaxLength()) {
            throw new TooLong(static::getMaxLength(), $length);
        }
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
