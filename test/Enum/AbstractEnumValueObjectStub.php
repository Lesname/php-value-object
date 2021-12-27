<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\AbstractEnumValueObject;

final class AbstractEnumValueObjectStub extends AbstractEnumValueObject
{
    public static function cases(): array
    {
        return [
            'foo',
            'bar',
        ];
    }
}
