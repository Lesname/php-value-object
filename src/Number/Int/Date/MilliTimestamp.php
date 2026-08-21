<?php

declare(strict_types=1);

namespace LesValueObject\Number\Int\Date;

use Override;
use DateTimeImmutable;
use DateTimeInterface;
use LesValueObject\Enum\Timezone;
use DateMalformedStringException;
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
     *
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall
     */
    public static function fromDateTime(DateTimeInterface $dateTime): self
    {
        return new self((int)$dateTime->format('Uv'));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     *
     * @psalm-impure
     *
     * @deprecated
     *
     * @psalm-suppress ImpureFunctionCall
     */
    public static function now(): self
    {
        return new self((int)floor(microtime(true) * 1_000));
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
     * @throws DateMalformedStringException
     *
     * @psalm-mutation-free
     *
     * @psalm-suppress ImpureMethodCall
     */
    public function toDateTime(Timezone $timezone): DateTimeInterface
    {
        return (new DateTimeImmutable('@' . ($this->value / 1_000)))
            ->setTimezone($timezone->asDateTimeZone());
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     *
     * @psalm-mutation-free
     */
    public function toTimestamp(): Timestamp
    {
        return new Timestamp((int) floor($this->value / 1_000));
    }
}
