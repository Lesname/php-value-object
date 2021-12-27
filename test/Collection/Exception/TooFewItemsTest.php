<?php
declare(strict_types=1);

namespace LessValueObjectTest\Collection\Exception;

use LessValueObject\Collection\Exception\TooFewItems;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Collection\Exception\TooFewItems
 */
final class TooFewItemsTest extends TestCase
{
    public function testConstruct(): void
    {
        $e = new TooFewItems(3, 2);

        self::assertSame(3, $e->min);
        self::assertSame(2, $e->given);
    }
}
