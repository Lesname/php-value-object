<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Exception;

use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\Uncomparable;
use LessValueObject\Number\Int\IntValueObject;
use LessValueObject\Number\NumberValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Exception\Uncomparable
 */
final class UncomparableTest extends TestCase
{
    public function testSetup(): void
    {
        $left = $this->createMock(NumberValueObject::class);
        $right = $this->createMock(IntValueObject::class);

        $e = new Uncomparable($left, $right);

        self::assertSame($left, $e->left);
        self::assertSame($right, $e->right);
    }
}
