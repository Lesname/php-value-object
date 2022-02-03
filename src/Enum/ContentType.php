<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
enum ContentType: string implements EnumValueObject
{
    case Markdown = 'markdown';
    case Text = 'text';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
