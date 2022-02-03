<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\SearchTerm;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\SearchTerm
 */
final class SearchTermTest extends TestCase
{
    public function testIsEmailAddress(): void
    {
        $term = new SearchTerm('foo@bar.nl');
        self::assertTrue($term->isEmailAddress());

        $term = new SearchTerm('foo');
        self::assertFalse($term->isEmailAddress());
    }

    public function testIsResourceId(): void
    {
        $term = new SearchTerm('614dbdee-db49-4690-882d-a6e09037e966');
        self::assertTrue($term->isResourceId());

        $term = new SearchTerm('biz');
        self::assertFalse($term->isResourceId());
    }
}
