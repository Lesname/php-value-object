<?php

declare(strict_types=1);

namespace LesValueObject\Number\Int\Date;

use Override;
use DateTimeImmutable;
use DateTimeInterface;
use LesValueObject\Enum\Timezone;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\NotMultipleOf;
use LesValueObject\Number\Int\AbstractIntValueObject;

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
    #[Override]
    public static function getMinimumValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    #[Override]
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
        return new MilliTimestamp($this->value * 1_000);
    }

    public function toDateTime(Timezone $timezone): DateTimeInterface
    {
        return (new DateTimeImmutable('@' . $this->value))
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
