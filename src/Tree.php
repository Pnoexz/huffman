<?php
/**
 * @author Matias Pino <pnoexz@gmail.com>
 * @license GPL v3.0
 */

namespace Pnoexz;

class Tree
{
    /**
     * @param string $text
     * @return string
     */
    public function cleanText(string $text): string
    {
        $onlyAlphanum = preg_replace('#\W|_#', ' ', $text);
        $noDoubleSpaces = preg_replace('#\s+#', ' ', $onlyAlphanum);
        $cleanText = strtolower($noDoubleSpaces);

        return $cleanText;
    }

    /**
     * @param string $text
     * @return array
     */
    public function generateOrderedFrequencyTable(string $text) :array
    {
        $asciiTable = count_chars($text, 1);
        arsort($asciiTable, SORT_NUMERIC);

        return $asciiTable;
    }
}
