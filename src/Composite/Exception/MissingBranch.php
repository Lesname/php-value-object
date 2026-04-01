<?php

declare(strict_types=1);

namespace LesValueObject\Composite\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class MissingBranch extends AbstractException
{
    public function __construct(public readonly string $given)
    {
        parent::__construct("Missing a branch for '{$given}'");
    }
}
