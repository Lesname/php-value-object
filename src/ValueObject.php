<?php
declare(strict_types=1);

namespace LesValueObject;

use JsonSerializable;

/**
 * @psalm-immutable
 */
interface ValueObject extends JsonSerializable
{
}
