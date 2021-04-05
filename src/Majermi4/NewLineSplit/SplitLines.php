<?php

declare(strict_types=1);

namespace Majermi4\NewLineSplit;

class SplitLines
{
    /**
     * @return array<string>
     */
    public static function splitText(string $text): array
    {
        /** @var array<string> $lines */
        $lines = preg_split('/\r\n|\n|\r/', $text);

        return $lines;
    }
}
