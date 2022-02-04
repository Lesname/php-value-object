<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Number\Int\Date\MilliTimestamp;

/**
 * @psalm-immutable
 */
final class Activity extends AbstractCompositeValueObject
{
    public function __construct(public readonly MilliTimestamp $last)
    {}
}
