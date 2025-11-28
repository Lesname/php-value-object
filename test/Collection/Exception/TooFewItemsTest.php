<?php

declare(strict_types=1);

namespace LesValueObjectTest\Collection\Exception;

use LesValueObject\Collection\Exception\TooFewItems;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Collection\Exception\TooFewItems
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
