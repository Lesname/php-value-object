<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use LessValueObject\Composite\Paginate;
use LessValueObject\Number\Int\Paginate\Page;
use LessValueObject\Number\Int\Paginate\PerPage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\Paginate
 */
final class PaginateTest extends TestCase
{
    public function testSkipped(): void
    {
        $paginate = new Paginate(
            new PerPage(45),
            new Page(3),
        );

        self::assertSame(90, $paginate->getSkipped());
    }
}
