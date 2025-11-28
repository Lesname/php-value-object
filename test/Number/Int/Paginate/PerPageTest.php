<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Paginate;

use LesValueObject\Number\Int\Paginate\PerPage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Paginate\PerPage
 */
final class PerPageTest extends TestCase
{
    public function testSetup(): void
    {
        self::assertSame(0, PerPage::getMinimumValue());
        self::assertSame(100, PerPage::getMaximumValue());
    }
}
