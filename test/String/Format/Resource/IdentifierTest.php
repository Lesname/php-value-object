<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format\Resource;

use LessValueObject\String\Format\Resource\Identifier;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Resource\Identifier
 */
final class IdentifierTest extends TestCase
{
    public function testSetup(): void
    {
        $id = new Identifier('614dbdee-db49-4690-882d-a6e09037e966');

        self::assertSame('614dbdee-db49-4690-882d-a6e09037e966', (string)$id);
    }

    public function testCreate(): void
    {
        $first = Identifier::generate();
        $second = Identifier::generate();

        self::assertNotSame((string)$first, (string)$second);
    }
}
