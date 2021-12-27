<?php
declare(strict_types=1);

namespace LessValueObjectTest\Collection\Exception;

use LessValueObject\Collection\Exception\TooManyItems;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Collection\Exception\TooManyItems
 */
final class TooManyItemsTest extends TestCase
{
    public function testConstruct(): void
    {
        $e = new TooManyItems(1, 2);

        self::assertSame(1, $e->max);
        self::assertSame(2, $e->given);
    }
}
