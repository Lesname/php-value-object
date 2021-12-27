<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite\Exception;

use LessValueObject\Composite\Exception\CannotParseReference;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\Exception\CannotParseReference
 */
final class CannotParseReferenceTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new CannotParseReference('fiz');

        self::assertSame('fiz', $e->given);
    }
}
