<?php

declare(strict_types=1);

namespace Majermi4\NewLineSplit;

use Majermi4\NewLineSplit\PhpDocParser\ParameterDescriptionParser;
use PHPUnit\Framework\TestCase;

class SplitLinesTest extends TestCase
{
    public function testSplitText(): void
    {
        $text = <<<EOF
This is some text
which has
three lines
EOF;

        $lines = SplitLines::splitText($text);

        static::assertCount(3, $lines);
    }

    public function testSplitPhpDocComment() : void
    {
        $class = new class(1) {
            /**
             * Some comment.
             *
             * @param int $property This is a property comment.
             */
            public function __construct(int $property) { }
        };

        $reflectionClass = new \ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();
        $parameter = $constructor->getParameters()[0];

        $propertyComment = ParameterDescriptionParser::getParameterDescription($parameter);

        static::assertSame('This is a property comment.', $propertyComment);
    }
}
