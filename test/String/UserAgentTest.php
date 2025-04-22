<?php
declare(strict_types=1);

namespace LesValueObjectTest\String;

use LesValueObject\String\Exception\TooLong;
use LesValueObject\String\Exception\TooShort;
use LesValueObject\String\UserAgent;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\UserAgent
 */
final class UserAgentTest extends TestCase
{
    /**
     * @throws TooShort
     * @throws TooLong
     */
    public function testConstruct(): void
    {
        $ua = new UserAgent(str_repeat('a', 255));
        self::assertSame(str_repeat('a', 255), (string)$ua);

        self::assertSame('c', (string)new UserAgent('c'));
    }

    /**
     * @throws TooShort
     */
    public function testTooLarge(): void
    {
        $this->expectException(TooLong::class);

        new UserAgent(str_repeat('a', 256));
    }
}
