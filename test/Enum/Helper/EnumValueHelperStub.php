<?php
declare(strict_types=1);

namespace LesValueObjectTest\Enum\Helper;

use LesValueObject\Enum\Helper\EnumValueHelper;

final class EnumValueHelperStub
{
    use EnumValueHelper;

    public string $value = 'fiz';
}
