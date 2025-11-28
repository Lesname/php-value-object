<?php

declare(strict_types=1);

namespace LesValueObject\Enum;

use LesValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum ContentType: string implements EnumValueObject
{
    use EnumValueHelper;

    case Markdown = 'markdown';
    case Text = 'text';
}
