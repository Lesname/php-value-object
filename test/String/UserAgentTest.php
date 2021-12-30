<?php
declare(strict_types=1);

namespace LessValueObjectTest\String;

use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\UserAgent;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @covers \LessValueObject\String\UserAgent
 */
final class UserAgentTest extends TestCase
{
    public function testConstruct(): void
    {
        $ua = new UserAgent(str_repeat('a', 255));
        self::assertSame(str_repeat('a', 255), (string)$ua);

        self::assertSame('c', (string)new UserAgent('c'));
    }

    public function testTooLarge(): void
    {
        $this->expectException(TooLong::class);

        new UserAgent(str_repeat('a', 256));
    }

    public function testFromRequest(): void
    {
        $request = $this->createMock(ServerRequestInterface::class);
        $request
            ->expects(self::once())
            ->method('getHeaderLine')
            ->with('user-agent')
            ->willReturn(str_repeat('a', 256));

        $userAgent = UserAgent::fromRequest($request);

        self::assertSame(str_repeat('a', 255), (string)$userAgent);
    }
}
