<?php

declare(strict_types=1);

namespace Majermi4\NewLineSplit;

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
}
