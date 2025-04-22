<?php
declare(strict_types=1);

namespace LesValueObject\String\Format\Exception;

use LesValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class UnknownVersion extends AbstractException
{
    /**
     * @psalm-pure
     */
    public function __construct(public readonly int $version)
    {
        parent::__construct("Version {$version} is unknown");
    }
}
