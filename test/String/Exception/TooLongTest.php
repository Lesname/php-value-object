<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Exception;

use LessValueObject\String\Exception\TooLong;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Exception\TooLong
 */
final class TooLongTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new TooLong(3, 2);

        self::assertSame(3, $e->maximal);
        self::assertSame(2, $e->given);
    }
}
