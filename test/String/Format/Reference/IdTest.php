<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Reference;

use LessValueObject\String\Format\Reference\Id;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Reference\Id
 */
final class IdTest extends TestCase
{
    public function testSetup(): void
    {
        $id = new Id('614dbdee-db49-4690-882d-a6e09037e966');

        self::assertSame('614dbdee-db49-4690-882d-a6e09037e966', (string)$id);
    }
}
