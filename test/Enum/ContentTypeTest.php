<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\ContentType;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\ContentType
 */
final class ContentTypeTest extends TestCase
{
    public function testCases(): void
    {
        self::assertSame(
            [
                'markdown',
                'text',
            ],
            ContentType::cases(),
        );
    }

    public function testMarkdown(): void
    {
        $markdown = ContentType::markdown();

        self::assertSame('markdown', $markdown->value);
    }

    public function testText(): void
    {
        $text = ContentType::text();

        self::assertSame('text', $text->value);
    }
}
