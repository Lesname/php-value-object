<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported

namespace LessValueObject\Enum;

use LessValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum ContentType: string implements EnumValueObject
{
    use EnumValueHelper;

    case Markdown = 'markdown';
    case Text = 'text';
}
