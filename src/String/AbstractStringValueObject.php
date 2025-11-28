<?php

declare(strict_types=1);

namespace LesValueObject\String;

use Override;
use Stringable;
use RuntimeException;
use LesValueObject\String\Exception\TooLong;
use LesValueObject\String\Exception\TooShort;

/**
 * @psalm-immutable
 */
abstract class AbstractStringValueObject implements StringValueObject
{
    public readonly string $value;

    /**
     * @throws TooShort
     * @throws TooLong
     */
    #[Override]
    public function __construct(Stringable|string $value)
    {
        $value = (string)$value;

        $length = static::getStringLength($value);

        if ($length < static::getMinimumLength()) {
            throw new TooShort(static::getMinimumLength(), $length);
        }

        if ($length > static::getMaximumLength()) {
            throw new TooLong(static::getMaximumLength(), $length);
        }

        $this->value = $value;
    }

    /**
     * @psalm-pure
     */
    public static function getStringLength(string $input): int
    {
        $length = grapheme_strlen($input);

        if (!is_int($length)) {
            throw new RuntimeException();
        }

        return $length;
    }

    #[Override]
    public function __toString(): string
    {
        return $this->value;
    }

    #[Override]
    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
