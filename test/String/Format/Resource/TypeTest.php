<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Resource;

use LesValueObject\String\Format\Resource\Type;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Resource\Type
 */
final class TypeTest extends TestCase
{
    public function testSetup(): void
    {
        $type = new Type('fiz.bar');

        self::assertSame('fiz.bar', (string)$type);
    }
}
