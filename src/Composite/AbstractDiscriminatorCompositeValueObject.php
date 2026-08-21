<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

use RuntimeException;
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
     *
     * @psalm-pure
     */
    public function __construct()
    {
        $discriminator = $this->{static::getDiscriminatingField()};

        if (!$discriminator instanceof StringValueObject && !$discriminator instanceof EnumValueObject) {
            throw new RuntimeException();
        }

        $mapping = static::getDiscriminatingMapping();

        if (!isset($mapping[$discriminator->value])) {
            throw new MissingBranch($discriminator->value);
        }

        $property = $this->{static::getDiscriminatingProperty()};

        if (!is_object($property)) {
            throw new RuntimeException();
        }

        if (!$property instanceof $mapping[$discriminator->value]) {
            throw new BranchMismatch($mapping[$discriminator->value], $property::class);
        }
    }

    /**
     * @psalm-pure
     */
    abstract public static function getDiscriminatingField(): string;

    /**
     * @psalm-pure
     */
    abstract public static function getDiscriminatingProperty(): string;

    /**
     * @return array<string, class-string<ValueObject>>
     *
     * @psalm-pure
     */
    abstract public static function getDiscriminatingMapping(): array;
}
