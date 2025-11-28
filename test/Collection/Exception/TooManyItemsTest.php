<?php

declare(strict_types=1);

namespace LesValueObjectTest\Collection\Exception;

use LesValueObject\Collection\Exception\TooManyItems;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Collection\Exception\TooManyItems
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
