<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Exception;

use LesValueObject\String\Exception\TooShort;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Exception\TooShort
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
