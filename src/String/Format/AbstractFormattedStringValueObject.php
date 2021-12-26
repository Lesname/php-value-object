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
abstract class AbstractFormattedStringValueObject extends AbstractStringValueObject implements FormattedStringValueObject
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
}
