<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Paginate;

use LessValueObject\Number\Int\Paginate\PerPage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Paginate\PerPage
 */
final class PerPageTest extends TestCase
{
    public function testSetup(): void
    {
        self::assertSame(0, PerPage::getMinimumValue());
        self::assertSame(100, PerPage::getMaximumValue());
    }
}
