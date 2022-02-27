<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\Timezone;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\Timezone
 */
final class TimezoneTest extends TestCase
{
    public function testAsDateTimeZone(): void
    {
        $zone = Timezone::Europe_Amsterdam;

        $dateTimeZone = $zone->asDateTimeZone();

        self::assertSame('Europe/Amsterdam', $dateTimeZone->getName());
    }
}
