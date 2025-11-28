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

    public function __construct(Stringable|string $value);

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int;

    #[Override]
    public function __toString(): string;
}
