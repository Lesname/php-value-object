<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use DateTime;
use LesValueObject\Enum\Timezone;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\NotMultipleOf;
use LesValueObject\Number\Int\Date\Timestamp;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Date\Timestamp
 */
final class TimestampTest extends TestCase
{
    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testFromDateTime(): void
    {
        $date = new DateTime();

        $timestamp = Timestamp::fromDateTime($date);

        self::assertSame($date->getTimestamp(), $timestamp->value);
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testNow(): void
    {
        self::assertSame(time(), Timestamp::now()->value);
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testFormat(): void
    {
        $timestamp = new Timestamp(120);

        self::assertSame('1970-01-01 00:02:00', $timestamp->format('Y-m-d H:i:s', Timezone::UTC));
        self::assertSame('1970-01-01 01:02:00', $timestamp->format('Y-m-d H:i:s', Timezone::Europe_Amsterdam));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testToMilliTimestamp(): void
    {
        $timestamp = new Timestamp(321);

        $milliTimestamp = $timestamp->toMilliTimestamp();

        self::assertSame(321_000, $milliTimestamp->value);
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testAppend(): void
    {
        $timestamp = new Timestamp(4);
        $new = $timestamp->append(6);

        self::assertSame(4, $timestamp->value);
        self::assertSame(10, $new);
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testSubtract(): void
    {
        $timestamp = new Timestamp(9);
        $new = $timestamp->subtract(7);

        self::assertSame(9, $timestamp->value);
        self::assertSame(2, $new);
    }
}
