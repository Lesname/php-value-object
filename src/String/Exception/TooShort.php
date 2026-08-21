<?php

declare(strict_types=1);

namespace LesValueObject\String\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class TooShort extends AbstractException
{
    /**
     * @psalm-pure
     */
    public function __construct(public readonly int $minimal, public readonly int $given)
    {
        parent::__construct("Minimal {$minimal} characters needed, given {$given}");
    }
}
