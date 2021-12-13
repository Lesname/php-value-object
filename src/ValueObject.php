<?php
declare(strict_types=1);

namespace LessValueObject;

use JsonSerializable;

/**
 * @psalm-immutable
 */
interface ValueObject extends JsonSerializable
{
}
