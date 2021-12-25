<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Date;

use DateTime;
use LessValueObject\Number\Int\Date\Timestamp;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Date\Timestamp
 */
final class TimestampTest extends TestCase
{
    public function testFromDateTime(): void
    {
        $date = new DateTime();

        $timestamp = Timestamp::fromDateTime($date);

        self::assertSame($date->getTimestamp(), $timestamp->getValue());
    }

    public function testNow(): void
    {
        self::assertSame(time(), Timestamp::now()->getValue());
    }

    public function testFormat(): void
    {
        $timestamp = new Timestamp(120);

        self::assertSame('1970-01-01 00:02:00', $timestamp->format('Y-m-d H:i:s'));
    }

    public function testToMilliTimestamp(): void
    {
        $timestamp = new Timestamp(321);

        $milliTimestamp = $timestamp->toMilliTimestamp();

        self::assertSame(321_000, $milliTimestamp->getValue());
    }
}
