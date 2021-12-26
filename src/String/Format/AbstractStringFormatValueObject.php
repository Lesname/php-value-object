<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\String\AbstractStringValueObject;
use LessValueObject\String\Format\Exception\NotFormat;

/**
 * @psalm-immutable
 */
abstract class AbstractStringFormatValueObject extends AbstractStringValueObject implements StringFormatValueObject
{
    public function __construct(string $string)
    {
        parent::__construct($string);

        if (!static::isFormat($string)) {
            throw new NotFormat(static::class, $string);
        }
    }
}
