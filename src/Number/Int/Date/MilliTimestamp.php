<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int\Date;

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
final class MilliTimestamp extends AbstractIntValueObject
{
    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self((int)$dateTime->format('Uv'));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public static function now(): self
    {
        return new self((int)floor(microtime(true) * 1_000));
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

    public function toDateTime(Timezone $timezone): DateTimeInterface
    {
        return (new DateTimeImmutable('@' . ($this->value / 1_000)))
            ->setTimezone($timezone->asDateTimeZone());
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function toTimestamp(): Timestamp
    {
        return new Timestamp((int) floor($this->getValue() / 1_000));
    }

    /**
     * @psalm-suppress ImpureMethodCall format is pure
     */
    public function format(string $format, Timezone $timezone): string
    {
        return $this->toDateTime($timezone)->format($format);
    }
}
