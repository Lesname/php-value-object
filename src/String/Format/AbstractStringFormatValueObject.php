<?php
declare(strict_types=1);

namespace LesValueObject\String\Format;

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
     *
     * @psalm-pure
     */
    public function __construct(string $string)
    {
        parent::__construct($string);

        if (!static::isFormat($string)) {
            throw new NotFormat(static::class, $string);
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
