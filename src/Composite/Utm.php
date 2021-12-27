<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use LessValueObject\String\UtmParameter;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @psalm-immutable
 */
final class Utm extends AbstractCompositeValueObject
{
    public function __construct(
        public ?UtmParameter $campaign,
        public ?UtmParameter $medium,
        public ?UtmParameter $source,
        public ?UtmParameter $term,
        public ?UtmParameter $content,
    ) {}

    /**
     * @throws TooLong
     * @throws TooShort
     *
     * @psalm-pure
     */
    public static function fromRequest(ServerRequestInterface $request): self
    {
        $campaign = self::getParameterFromRequest($request, 'x-utm-campaign');
        $medium = self::getParameterFromRequest($request, 'x-utm-medium');
        $source = self::getParameterFromRequest($request, 'x-utm-source');
        $term = self::getParameterFromRequest($request, 'x-utm-term');
        $content = self::getParameterFromRequest($request, 'x-utm-content');

        return new self($campaign, $medium, $source, $term, $content);
    }

    /**
     * @throws TooLong
     * @throws TooShort
     *
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall pure call
     */
    private static function getParameterFromRequest(ServerRequestInterface $request, string $key): ?UtmParameter
    {
        $parameter = $request->getHeaderLine($key);

        if (trim($parameter) === '') {
            return null;
        }

        return new UtmParameter(mb_substr($parameter, 0, 100));
    }
}
