<?php
declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Resource;

use LesValueObject\String\Format\Resource\Identifier;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Resource\Identifier
 */
final class IdentifierTest extends TestCase
{
    public function testSetup(): void
    {
        $id = new Identifier('614dbdee-db49-4690-882d-a6e09037e966');

        self::assertSame('614dbdee-db49-4690-882d-a6e09037e966', (string)$id);
    }
}
