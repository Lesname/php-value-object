<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

use LessValueObject\Number\AbstractNumberValueObject;

/**
 * @psalm-immutable
 */
abstract class AbstractIntValueObject extends AbstractNumberValueObject implements IntValueObject
{
    public function __construct(private int $value)
    {
        parent::__construct($value);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Int is always 0
     *
     * @psalm-pure
     */
    public static function getPrecision(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    abstract public static function getMinValue(): int;

    /**
     * @psalm-pure
     */
    abstract public static function getMaxValue(): int;
}
