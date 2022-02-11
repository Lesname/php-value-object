<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported
namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
enum FilterMode: string implements EnumValueObject
{
    case All = 'all';
    case Any = 'any';
    case None = 'none';

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
