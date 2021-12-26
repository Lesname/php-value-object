<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\Date;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Date
 */
final class DateTest extends TestCase
{
    public function testFormat(): void
    {
        self::assertTrue(Date::isFormat('2021-12-30'));
        self::assertFalse(Date::isFormat('2021-12-32'));
        self::assertFalse(Date::isFormat('1-12-32'));
        self::assertFalse(Date::isFormat('2021-a-32'));
    }

    public function testLengthConstraint(): void
    {
        self::assertSame(8, Date::getMinLength());
        self::assertSame(10, Date::getMaxLength());
    }

    public function testGetters(): void
    {
        $date = new Date('2021-12-30');

        self::assertSame(2021, $date->getYear());
        self::assertSame(12, $date->getMonth());
        self::assertSame(30, $date->getDay());
    }
}
