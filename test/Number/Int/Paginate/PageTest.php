<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Paginate;

use LesValueObject\Number\Int\Paginate\Page;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Paginate\Page
 */
final class PageTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Page::getMinimumValue());
        self::assertSame(PHP_INT_MAX, Page::getMaximumValue());
    }
}
