<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Exception;

use LessValueObject\String\Exception\TooShort;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Exception\TooShort
 */
final class TooShortTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new TooShort(1, 2);

        self::assertSame(1, $e->minimal);
        self::assertSame(2, $e->given);
    }
}
