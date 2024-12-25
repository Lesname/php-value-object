<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Exception;

use LessValueObject\Exception\AbstractException;

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
