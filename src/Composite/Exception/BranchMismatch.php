<?php

declare(strict_types=1);

namespace LesValueObject\Composite\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class BranchMismatch extends AbstractException
{
    public function __construct(
        public readonly string $expected,
        public readonly string $actual
    ) {
        parent::__construct("Expected {$expected}, got {$actual}");
    }
}
