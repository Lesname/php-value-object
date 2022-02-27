<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum\Helper;

use LessValueObject\Enum\Helper\EnumValueHelper;

final class EnumValueHelperStub
{
    use EnumValueHelper;

    public string $value = 'fiz';
}
