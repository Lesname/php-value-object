<?php
declare(strict_types=1);

namespace LessValueObject\Enum\Exception;

use LessValueObject\Enum\EnumValueObject;
use LessValueObject\Exception\AbstractException;

/**
 * @psalm-immutable
 */
final class UnknownCase extends AbstractException
{
    /**
     * @param class-string<EnumValueObject> $enum
     * @param string $unknown
     */
    public function __construct(public string $enum, public string $unknown)
    {
        parent::__construct("{$enum} does not know the case '{$unknown}'");
    }
}
