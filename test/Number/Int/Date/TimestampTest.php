<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use DateTime;
use LesValueObject\Enum\Timezone;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\PrecisionOutBounds;
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
     * @throws PrecisionOutBounds
     */
    public function testFromDateTime(): void
    {
        $date = new DateTime();

        $timestamp = Timestamp::fromDateTime($date);

        self::assertSame($date->getTimestamp(), $timestamp->getValue());
    }

    /**
     * @throws MinOutBounds
     * @throws MaxOutBounds
     * @throws PrecisionOutBounds
     */
    public function testNow(): void
    {
        self::assertSame(time(), Timestamp::now()->getValue());
    }

    /**
     * @throws MinOutBounds
     * @throws MaxOutBounds
     * @throws PrecisionOutBounds
     */
    public function testFormat(): void
    {
        $timestamp = new Timestamp(120);

        self::assertSame('1970-01-01 00:02:00', $timestamp->format('Y-m-d H:i:s', Timezone::UTC));
        self::assertSame('1970-01-01 01:02:00', $timestamp->format('Y-m-d H:i:s', Timezone::Europe_Amsterdam));
    }

    /**
     * @throws PrecisionOutBounds
     * @throws MinOutBounds
     * @throws MaxOutBounds
     */
    public function testToMilliTimestamp(): void
    {
        $timestamp = new Timestamp(321);

        $milliTimestamp = $timestamp->toMilliTimestamp();

        self::assertSame(321_000, $milliTimestamp->getValue());
    }

    public function testAppend(): void
    {
        $timestamp = new Timestamp(4);
        $new = $timestamp->append(6);

        self::assertSame(4, $timestamp->getValue());
        self::assertSame(10, $new->getValue());
    }

    public function testSubtract(): void
    {
        $timestamp = new Timestamp(9);
        $new = $timestamp->subtract(7);

        self::assertSame(9, $timestamp->getValue());
        self::assertSame(2, $new->getValue());
    }
}
