<?php
declare(strict_types=1);

namespace LessValueObject\String;

use Psr\Http\Message\ServerRequestInterface;

/**
 * There is no defined max length for user agent, although after some amount it becomes junk
 *
 * @psalm-immutable
 */
final class UserAgent extends AbstractStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinLength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return 255;
    }

    /**
     * @psalm-suppress ImpureMethodCall is getter
     *
     * @psalm-pure
     */
    public static function fromRequest(ServerRequestInterface $request): ?UserAgent
    {
        $userAgent = $request->getHeaderLine('user-agent') ?: null;

        return is_string($userAgent) && mb_strlen($userAgent) >= self::getMinLength()
            ? new self(mb_substr($userAgent, 0, self::getMaxLength()))
            : null;
    }
}
