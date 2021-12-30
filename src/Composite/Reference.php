<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Composite\Exception\CannotParseReference;
use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use LessValueObject\String\Format\Exception\NotFormat;
use LessValueObject\String\Format\Reference\Id;
use LessValueObject\String\Format\Reference\Type;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @psalm-immutable
 */
final class Reference extends AbstractCompositeValueObject
{
    public function __construct(public Type $type, public Id $id)
    {}

    /**
     * @psalm-pure
     *
     * @throws TooShort
     * @throws NotFormat
     * @throws TooLong
     * @throws CannotParseReference
     */
    public static function fromString(string $string): self
    {
        if (!preg_match('#(.*)/(.*)#', $string, $matches)) {
            throw new CannotParseReference($string);
        }

        return new self(new Type($matches[1]), new Id($matches[2]));
    }

    /**
     * @param array{type: string, id: string} $array
     *
     * @psalm-pure
     *
     * @throws TooShort
     * @throws NotFormat
     * @throws TooLong
     */
    public static function fromArray(array $array): self
    {
        return new self(new Type($array['type']), new Id($array['id']));
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall getter
     */
    public static function fromRequest(ServerRequestInterface $request): ?Reference
    {
        $identity = $request->getAttribute('identity');
        assert(is_string($identity) || is_null($identity), 'Identity must be string or null');

        return is_string($identity)
            ? self::fromString($identity)
            : null;
    }

    public function __toString(): string
    {
        return "{$this->type}/{$this->id}";
    }
}
