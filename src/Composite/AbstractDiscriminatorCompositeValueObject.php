<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

use LesValueObject\ValueObject;
use LesValueObject\Enum\EnumValueObject;
use LesValueObject\String\StringValueObject;
use LesValueObject\Composite\Exception\MissingBranch;
use LesValueObject\Composite\Exception\BranchMismatch;

/**
 * @psalm-immutable
 */
abstract class AbstractDiscriminatorCompositeValueObject extends AbstractCompositeValueObject
{
    /**
     * @throws BranchMismatch
     * @throws MissingBranch
     */
    public function __construct()
    {
        $discriminator = $this->{static::getDiscriminatingField()};
        assert($discriminator instanceof StringValueObject || $discriminator instanceof EnumValueObject);

        $mapping = static::getDiscriminatingMapping();

        if (!isset($mapping[$discriminator->value])) {
            throw new MissingBranch($discriminator->value);
        }

        $property = $this->{static::getDiscriminatingProperty()};
        assert(is_object($property));

        if (!$property instanceof $mapping[$discriminator->value]) {
            throw new BranchMismatch($mapping[$discriminator->value], $property::class);
        }
    }

    abstract public static function getDiscriminatingField(): string;

    abstract public static function getDiscriminatingProperty(): string;

    /**
     * @return array<string, class-string<ValueObject>>
     */
    abstract public static function getDiscriminatingMapping(): array;
}
