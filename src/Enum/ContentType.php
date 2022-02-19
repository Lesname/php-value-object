<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported
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

    public function getValue(): string
    {
        return $this->value;
    }
}
