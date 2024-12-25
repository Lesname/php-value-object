<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int\Date;

use DateTimeImmutable;
use DateTimeInterface;
use LessValueObject\Enum\Timezone;
use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\NotMultipleOf;
use LessValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Timestamp extends AbstractIntValueObject
{
    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self($dateTime->getTimestamp());
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public static function now(): self
    {
        return new self(time());
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int
    {
        return PHP_INT_MAX;
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function toMilliTimestamp(): MilliTimestamp
    {
        return new MilliTimestamp($this->getValue() * 1_000);
    }

    public function toDateTime(Timezone $timezone): DateTimeInterface
    {
        return (new DateTimeImmutable('@' . $this->getValue()))
            ->setTimezone($timezone->asDateTimeZone());
    }

    /**
     * @psalm-suppress ImpureMethodCall format is pure
     */
    public function format(string $format, Timezone $timezone): string
    {
        return $this->toDateTime($timezone)->format($format);
    }
}
