<?php
declare(strict_types=1);

namespace LesValueObject\String\Format\Uri;

use LesValueObject\Attribute\DocExample;

/**
 * @psalm-immutable
 */
#[DocExample('https://fiz.biz/bar?abc=xyz#123')]
#[DocExample('https://example.com')]
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
