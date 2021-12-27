<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Number\Int\Date\MilliTimestamp;

/**
 * @psalm-immutable
 */
final class Occurred extends AbstractCompositeValueObject
{
    public function __construct(public MilliTimestamp $on)
    {}
}
