<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported

namespace LessValueObject\Enum;

use DateTimeZone;
use LessValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum Timezone: string implements EnumValueObject
{
    use EnumValueHelper;

    case UTC = 'utc';

    case Europe_Amsterdam = 'Europe/Amsterdam';
    case Europe_Dublin = 'Europe/Dublin';

    public function asDateTimeZone(): DateTimeZone
    {
        return new DateTimeZone($this->value);
    }
}
