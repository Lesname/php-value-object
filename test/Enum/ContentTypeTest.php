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
    public function testMarkdown(): void
    {
        $markdown = ContentType::Markdown;

        self::assertSame('markdown', $markdown->jsonSerialize());
    }

    public function testText(): void
    {
        $text = ContentType::Text;

        self::assertSame('text', $text->jsonSerialize());
    }
}
