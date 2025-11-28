<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

use LesValueObject\Number\Int\Paginate\Page;
use LesValueObject\Number\Int\Paginate\PerPage;

/**
 * @psalm-immutable
 */
final class Paginate extends AbstractCompositeValueObject
{
    public function __construct(public readonly PerPage $perPage, public readonly Page $page)
    {}

    public function getSkipped(): int
    {
        return ($this->page->value - 1) * $this->perPage->value;
    }
}
