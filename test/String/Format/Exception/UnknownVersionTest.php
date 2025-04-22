<?php
declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Exception;

use LesValueObject\String\Format\Exception\UnknownVersion;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Exception\UnknownVersion
 */
final class UnknownVersionTest extends TestCase
{
    public function testConstruct(): void
    {
        $e = new UnknownVersion(1);

        self::assertSame(1, $e->version);
    }
}
