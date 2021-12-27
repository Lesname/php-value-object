<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int\Date;

use DateTime;
use DateTimeInterface;
use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\PrecisionOutBounds;
use LessValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Timestamp extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     *
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     *
     * @psalm-suppress ImpureMethodCall getTimestamp
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self($dateTime->getTimestamp());
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public static function now(): self
    {
        return new self(time());
    }

    /**
     * @psalm-pure
     */
    public static function getMinValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxValue(): int
    {
        return PHP_INT_MAX;
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public function toMilliTimestamp(): MilliTimestamp
    {
        return new MilliTimestamp($this->getValue() * 1_000);
    }

    public function toDateTime(): DateTimeInterface
    {
        return new DateTime('@' . $this->getValue());
    }

    /**
     * @psalm-suppress ImpureMethodCall format is pure
     */
    public function format(string $format): string
    {
        return $this->toDateTime()->format($format);
    }
}
