<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

use LessValueObject\Enum\Exception\UnknownCase;

/**
 * @psalm-immutable
 */
abstract class AbstractEnumValueObject implements EnumValueObject
{
    /**
     * @var array<string, static>
     */
    protected static array $instances = [];

    /**
     * @throws UnknownCase
     */
    final private function __construct(public string $value)
    {
        if (!in_array($value, static::cases(), true)) {
            throw new UnknownCase(static::class, $value);
        }
    }

    /**
     * @throws UnknownCase
     *
     * @psalm-pure
     *
     * @psalm-suppress ImpureStaticProperty should be seen as pure
     */
    public static function from(string $value): static
    {
        return static::$instances[static::class . ':' . $value] ??= new static($value);
    }

    /**
     * @psalm-pure
     */
    public static function tryFrom(string $value): ?static
    {
        try {
            return static::from($value);
        } catch (UnknownCase) {
            return null;
        }
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
