<?php
declare(strict_types=1);

namespace LessValueObjectTest\String;

use LessValueObject\String\ContentBody;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\ContentBody
 */
final class ContentBodyTest extends TestCase
{
    public function testConstraints(): void
    {
        self::assertSame(1, ContentBody::getMinimumLength());
        self::assertSame(15_000, ContentBody::getMaximumLength());
    }
}
