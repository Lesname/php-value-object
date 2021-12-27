<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use LessValueObject\Composite\Utm;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @covers \LessValueObject\Composite\Utm
 */
final class UtmTest extends TestCase
{
    public function testFromRequest(): void
    {
        $request = $this->createMock(ServerRequestInterface::class);

        $request
            ->expects(self::exactly(5))
            ->method('getHeaderLine')
            ->willReturnMap(
                [
                    ['x-utm-campaign', 'campaign'],
                    ['x-utm-medium', 'medium'],
                    ['x-utm-source', 'source'],
                    ['x-utm-term', 'term'],
                    ['x-utm-content', 'content'],
                ],
            );

        $utm = Utm::fromRequest($request);

        self::assertSame('campaign', (string)$utm->campaign);
        self::assertSame('medium', (string)$utm->medium);
        self::assertSame('source', (string)$utm->source);
        self::assertSame('term', (string)$utm->term);
        self::assertSame('content', (string)$utm->content);
    }


    public function testFromRequestNullable(): void
    {
        $request = $this->createMock(ServerRequestInterface::class);

        $request
            ->expects(self::exactly(5))
            ->method('getHeaderLine')
            ->willReturnMap(
                [
                    ['x-utm-campaign', ''],
                    ['x-utm-medium', ''],
                    ['x-utm-source', ''],
                    ['x-utm-term', ''],
                    ['x-utm-content', ''],
                ],
            );

        $utm = Utm::fromRequest($request);

        self::assertNull($utm->campaign);
        self::assertNull($utm->medium);
        self::assertNull($utm->source);
        self::assertNull($utm->term);
        self::assertNull($utm->content);
    }
}
