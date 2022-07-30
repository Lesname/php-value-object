<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Uri;

/**
 * @psalm-immutable
 */
final class Https extends AbstractUri
{
    /**
     * @psalm-pure
     */
    protected static function isSupportedScheme(string $scheme): bool
    {
        return $scheme === 'https';
    }
}
