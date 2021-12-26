<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Exception;

use LessValueObject\String\Format\Exception\NotFormat;
use LessValueObject\String\Format\StringFormatValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Exception\NotFormat
 */
final class NotFormatTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new NotFormat(StringFormatValueObject::class, 'fiz');

        self::assertSame(StringFormatValueObject::class, $e->expected);
        self::assertSame('fiz', $e->given);
    }
}
