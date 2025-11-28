<?php

declare(strict_types=1);

namespace LesValueObjectTest\Composite\Exception;

use LesValueObject\Composite\Exception\CannotParseReference;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Composite\Exception\CannotParseReference
 */
final class CannotParseReferenceTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new CannotParseReference('fiz');

        self::assertSame('fiz', $e->given);
    }
}
