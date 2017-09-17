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

    public function testCleanTest()
    {
        $text = 'dDLZRG=D/~zcc34Dp\S~KJQ"JE]jCb*Bf>f(w/\'[%(MR8P@s~7=V*bf/%y^b'.
            'f{]E9fAXh\'gXYJ5PA\~CDh!K)F>+@v@f}x[^!nXk?5YTzn&u;`s3!f]fWK3^>",_'.
            ';*sfVr`B@>G,D8V=PkNem\7Z_P^j&)?3rAh,"[L:qnMuDU_J6N&]D~y9nz@Ct8AT5'.
            '-7w3BW\.VES;z5JYyLX]8h>8/EU_4}N{(yVT:>ZZ#>#W,Y.XNfD56(JHZ)*p->@[&';

        $cleanText = $this->getTree()->cleanText($text);

        $this->assertInternalType('string', $cleanText);
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
