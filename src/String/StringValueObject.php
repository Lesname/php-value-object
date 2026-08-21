<?php

declare(strict_types=1);

namespace LesValueObject\String;

use Override;
use Stringable;
use LesValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface StringValueObject extends ValueObject, Stringable
{
    public string $value { get; }

    /**
     * @psalm-mutation-free
     */
    public function __construct(StringValueObject|string $value);

    /**
     * @psalm-mutation-free
     */
    public function isEqual(Stringable|string $value): bool;

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int;

    /**
     * @psalm-pure
     */
    #[Override]
    public function __toString(): string;
}
