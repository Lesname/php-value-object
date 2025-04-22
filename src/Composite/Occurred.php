<?php
declare(strict_types=1);

namespace LesValueObject\Composite;

use LesValueObject\Number\Int\Date\MilliTimestamp;

/**
 * @psalm-immutable
 */
final class Occurred extends AbstractCompositeValueObject
{
    public function __construct(public readonly MilliTimestamp $on)
    {}
}
