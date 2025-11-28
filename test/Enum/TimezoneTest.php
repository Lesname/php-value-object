<?php

declare(strict_types=1);

namespace LesValueObjectTest\Enum;

use LesValueObject\Enum\Timezone;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Enum\Timezone
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
