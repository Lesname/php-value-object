<?php

declare(strict_types=1);

namespace LesValueObject\String\Format;

use Override;
use Stringable;
use LesValueObject\String\AbstractStringValueObject;
use LesValueObject\String\Exception\TooLong;
use LesValueObject\String\Exception\TooShort;
use LesValueObject\String\Format\Exception\NotFormat;

/**
 * @psalm-immutable
 */
abstract class AbstractStringFormatValueObject extends AbstractStringValueObject implements StringFormatValueObject
{
    /**
     * @throws NotFormat
     * @throws TooLong
     * @throws TooShort
     */
    #[Override]
    public function __construct(Stringable|string $value)
    {
        parent::__construct($value);

        if (!static::isFormat($this->value)) {
            throw new NotFormat(static::class, $this->value);
        }
    }

    /**
     * @psalm-pure
     */
    protected static function isLengthAllowed(string $input): bool
    {
        $length = self::getStringLength($input);

        return $length >= static::getMinimumLength() && $length <= static::getMaximumLength();
    }
}
