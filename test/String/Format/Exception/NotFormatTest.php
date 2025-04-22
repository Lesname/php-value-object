<?php
declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Exception;

use LesValueObject\String\Format\Exception\NotFormat;
use LesValueObject\String\Format\FormattedStringValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Exception\NotFormat
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
