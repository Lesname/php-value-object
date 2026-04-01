<?php

declare(strict_types=1);

namespace LesValueObjectTest\Composite;

use LesValueObject\Enum\ContentType;
use LesValueObject\Enum\CountryCode;
use LesValueObject\Number\Int\Date\Timestamp;
use LesValueObject\Number\Int\Date\MilliTimestamp;
use LesValueObject\Composite\Exception\MissingBranch;
use LesValueObject\Composite\Exception\BranchMismatch;
use LesValueObject\Composite\AbstractDiscriminatorCompositeValueObject;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(AbstractDiscriminatorCompositeValueObject::class)]
class AbstractDiscriminatorCompositeValueObjectTest extends TestCase
{
    public function testNoIssues(): void
    {
        $type = CountryCode::Netherlands;
        $time = new MilliTimestamp(1);

        $class = new class ($type, $time) extends AbstractDiscriminatorCompositeValueObject {
            public function __construct(
                public readonly CountryCode $type,
                public readonly MilliTimestamp | Timestamp $time,
            ) {
                parent::__construct();
            }

            public static function getDiscriminatingField(): string
            {
                return 'type';
            }

            public static function getDiscriminatingProperty(): string
            {
                return 'time';
            }

            public static function getDiscriminatingMapping(): array
            {
                return [
                    CountryCode::Netherlands->value => MilliTimestamp::class,
                    CountryCode::Belgium->value => Timestamp::class,
                ];
            }
        };

        self::assertSame($type, $class->type);
    }

    public function testMissingBranch(): void
    {
        $this->expectException(MissingBranch::class);

        $type = CountryCode::Nepal;
        $time = new MilliTimestamp(1);

        new class ($type, $time) extends AbstractDiscriminatorCompositeValueObject {
            public function __construct(
                public readonly CountryCode $type,
                public readonly MilliTimestamp | Timestamp $time,
            ) {
                parent::__construct();
            }

            public static function getDiscriminatingField(): string
            {
                return 'type';
            }

            public static function getDiscriminatingProperty(): string
            {
                return 'time';
            }

            public static function getDiscriminatingMapping(): array
            {
                return [
                    CountryCode::Netherlands->value => MilliTimestamp::class,
                    CountryCode::Belgium->value => Timestamp::class,
                ];
            }
        };
    }

    public function testBranchMismatch(): void
    {
        $this->expectException(BranchMismatch::class);

        $type = CountryCode::Belgium;
        $time = new MilliTimestamp(1);

        new class ($type, $time) extends AbstractDiscriminatorCompositeValueObject {
            public function __construct(
                public readonly CountryCode $type,
                public readonly MilliTimestamp | Timestamp $time,
            ) {
                parent::__construct();
            }

            public static function getDiscriminatingField(): string
            {
                return 'type';
            }

            public static function getDiscriminatingProperty(): string
            {
                return 'time';
            }

            public static function getDiscriminatingMapping(): array
            {
                return [
                    CountryCode::Netherlands->value => MilliTimestamp::class,
                    CountryCode::Belgium->value => Timestamp::class,
                ];
            }
        };
    }
}
