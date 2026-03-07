<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use DateTime;
use LesValueObject\Enum\Timezone;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Int\Date\MilliTimestamp;
use PHPUnit\Framework\TestCase;
use LesValueObject\Number\Exception\NotMultipleOf;

/**
 * @covers \LesValueObject\Number\Int\Date\MilliTimestamp
 */
final class MilliTimestampTest extends TestCase
{
    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testFromDateTime(): void
    {
        $date = new DateTime();
        $timestamp = MilliTimestamp::fromDateTime($date);

        self::assertSame(
            (int)$date->format('Uv'),
            $timestamp->value,
        );
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testNow(): void
    {
        $datetime = MilliTimestamp::fromDateTime(new DateTime());
        $now = MilliTimestamp::now();

        $diff = abs($now->value - $datetime->value);

        // Allow for 1 ms leeway
        self::assertTrue($diff <= 1);
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function testToMilliTimestamp(): void
    {
        $timestamp = new MilliTimestamp(654321);

        $timestmap = $timestamp->toTimestamp();

        self::assertSame(654, $timestmap->value);
    }
}
