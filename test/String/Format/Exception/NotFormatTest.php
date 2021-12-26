<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Exception;

use LessValueObject\String\Format\Exception\NotFormat;
use LessValueObject\String\Format\FormattedStringValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Exception\NotFormat
 */
final class NotFormatTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new NotFormat(FormattedStringValueObject::class, 'fiz');

        self::assertSame(FormattedStringValueObject::class, $e->expected);
        self::assertSame('fiz', $e->given);
    }
}
