<?php
/**
 * @author Matias Pino <pnoexz@gmail.com>
 * @license GPL v3.0
 */

namespace Pnoexz\Tests;

use PHPUnit\Framework\TestCase;
use Pnoexz\Tree;

class TreeTest extends TestCase
{
    /**
     * @return Tree
     */
    public function getTree()
    {
        return new tree();
    }

    public function testInstance()
    {
        $tree = new Tree();
        $this->assertInstanceOf('Pnoexz\Tree', $tree);
    }

    public function testCleanTestOnlyAlphanum()
    {
        $text = 'deioun=d/~zcc34dp\s~kjq"je]jcb*bf>f(w/\'[%(mr8p@s~7=v*bf/%y^b';
        $expected = 'deioun d zcc34dp s kjq je jcb bf f w mr8p s 7 v bf y b';
        $cleanText = $this->getTree()->cleanText($text);

        $this->assertInternalType('string', $cleanText);
        $this->assertSame($expected, $cleanText);
    }

    public function testCleanTestNoDoubleSpaces()
    {
        $text = "cleaning  double\t\nspaces\r\n\nis \rfun";
        $expected = 'cleaning double spaces is fun';

        $cleanText = $this->getTree()->cleanText($text);

        $this->assertInternalType('string', $cleanText);
        $this->assertSame($expected, $cleanText);
    }

    public function testCleanTestLowercase()
    {
        $text = "THIS sentence SHOUld Be LowerCase";
        $expected = 'this sentence should be lowercase';

        $cleanText = $this->getTree()->cleanText($text);

        $this->assertInternalType('string', $cleanText);
        $this->assertSame($expected, $cleanText);
    }

    public function testFrequencyTable()
    {
        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis'.
            ' a dictum mauris. Vivamus ut nulla tristique, sodales leo at, rut'.
            'rum sem. Curabitur mollis ultricies nibh, at mollis tortor sollic'.
            'itudin sit amet. Sed interdum enim in imperdiet interdum. Donec u'.
            't lacinia urna. Praesent et odio sit amet nulla lacinia placerat '.
            'quis vitae ipsum. Nam consequat porttitor ipsum tristique congue.'.
            ' Interdum et malesuada fames ac ante ipsum primis in faucibus. Mo'.
            'rbi et orci pellentesque, posuere dui viverra, hendrerit nisl.';

        $table = $this->getTree()->generateFrequencyTable($text);
        $this->assertInternalType('array', $table);
    }
}
