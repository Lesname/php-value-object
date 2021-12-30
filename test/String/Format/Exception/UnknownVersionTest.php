<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Exception;

use LessValueObject\String\Format\Exception\UnknownVersion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Exception\UnknownVersion
 */
final class UnknownVersionTest extends TestCase
{
    public function testConstruct(): void
    {
        $e = new UnknownVersion(1);

        self::assertSame(1, $e->version);
    }
}
