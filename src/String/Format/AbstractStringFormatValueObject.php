<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\String\AbstractStringValueObject;
use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use LessValueObject\String\Format\Exception\NotFormat;

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
