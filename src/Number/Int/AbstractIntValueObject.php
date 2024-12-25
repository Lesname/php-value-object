<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

use TypeError;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\NotMultipleOf;
use LessValueObject\Number\AbstractNumberValueObject;

/**
 * @psalm-immutable
 */
abstract class AbstractIntValueObject extends AbstractNumberValueObject implements IntValueObject
{
    private readonly int $value;

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function __construct(float | int $value)
    {
        if (!is_int($value)) {
            throw new TypeError('Expected int, got float');
        }

        parent::__construct($value);

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @psalm-pure
     */
    public static function getMultipleOf(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    abstract public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    abstract public static function getMaximumValue(): int;
}
