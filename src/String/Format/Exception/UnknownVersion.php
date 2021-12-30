<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Exception;

use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class UnknownVersion extends AbstractException
{
    public function __construct(public int $version)
    {
        parent::__construct("Version {$version} is unknown");
    }
}
