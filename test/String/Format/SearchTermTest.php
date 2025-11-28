<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Format;

use LesValueObject\String\Format\EmailAddress;
use LesValueObject\String\Format\SearchTerm;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\SearchTerm
 */
final class SearchTermTest extends TestCase
{
    public function testIsEmailAddress(): void
    {
        $term = new SearchTerm('foo@bar.nl');
        self::assertTrue($term->matchesFormat(EmailAddress::class));

        $term = new SearchTerm('foo');
        self::assertFalse($term->matchesFormat(EmailAddress::class));
    }

    public function testAsEmailAddress(): void
    {
        $term = new SearchTerm('foo@bar.nl');
        self::assertInstanceOf(EmailAddress::class, $term->toFormat(EmailAddress::class));
    }
}
