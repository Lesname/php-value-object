<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Number\Int\Paginate\Page;
use LessValueObject\Number\Int\Paginate\PerPage;

/**
 * @psalm-immutable
 */
final class Paginate extends AbstractCompositeValueObject
{
    public function __construct(public readonly PerPage $perPage, public readonly Page $page)
    {}

    public function getSkipped(): int
    {
        return ($this->page->getValue() - 1) * $this->perPage->getValue();
    }
}
