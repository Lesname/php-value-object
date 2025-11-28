<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Exception;

use LesValueObject\String\Exception\TooLong;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Exception\TooLong
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
