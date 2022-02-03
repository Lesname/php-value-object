<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Resource;

use LessValueObject\String\Format\Resource\Type;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Resource\Type
 */
final class TypeTest extends TestCase
{
    public function testSetup(): void
    {
        $type = new Type('fiz.bar');

        self::assertSame('fiz.bar', (string)$type);
    }
}
