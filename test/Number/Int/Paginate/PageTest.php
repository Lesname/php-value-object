<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Paginate;

use LessValueObject\Number\Int\Paginate\Page;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Paginate\Page
 */
final class PageTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Page::getMinimumValue());
        self::assertSame(PHP_INT_MAX, Page::getMaximumValue());
    }
}
