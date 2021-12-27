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
final class MilliTimestamp extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     *
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     *
     * @psalm-suppress ImpureMethodCall getTimestamp and format are pure
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self((int)($dateTime->getTimestamp() . $dateTime->format('v')));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public static function now(): self
    {
        return new self((int)floor(microtime(true) * 1_000));
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

    public function toDateTime(): DateTimeInterface
    {
        return new DateTime('@' . ($this->getValue() / 1_000));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public function toTimestamp(): Timestamp
    {
        return new Timestamp((int) floor($this->getValue() / 1_000));
    }

    /**
     * @psalm-suppress ImpureMethodCall format is pure
     */
    public function format(string $format): string
    {
        return $this->toDateTime()->format($format);
    }
}
