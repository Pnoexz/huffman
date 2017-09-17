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
     * Splits a string into an array but using the respective ASCII character as
     * value. This is done to prevent using an invalid character as key further
     * down the line.
     *
     * @param string $text
     * @return array
     */
    public function splitStringIntoAsciiArray(string $text): array
    {
        $array = [];
        foreach (str_split($text) as $character) {
            $array[] = ord($character);
        }

        return $array;
    }

    /**
     * @param string $text
     * @return array
     */
    public function generateFrequencyTable(string $text) :array
    {

        return [];
    }
}
