<?php
declare(strict_types=1);

namespace LesValueObjectTest\Composite;

use LesValueObject\Composite\Paginate;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\PrecisionOutBounds;
use LesValueObject\Number\Int\Paginate\Page;
use LesValueObject\Number\Int\Paginate\PerPage;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Composite\Paginate
 */
final class PaginateTest extends TestCase
{
    /**
     * @throws PrecisionOutBounds
     * @throws MaxOutBounds
     * @throws MinOutBounds
     */
    public function testSkipped(): void
    {
        $paginate = new Paginate(
            new PerPage(45),
            new Page(3),
        );

        self::assertSame(90, $paginate->getSkipped());
    }
}
