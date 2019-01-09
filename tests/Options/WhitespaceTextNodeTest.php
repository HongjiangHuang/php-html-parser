<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPHtmlParser\Dom;

class WhitespaceTextNodeTest extends TestCase {

    public function testConfigGlobalNoWhitespaceTextNode()
    {
        $dom = new Dom;
        $dom->setOptions([
            'whitespaceTextNode' => false,
        ]);
        $dom->load('<div><p id="hey">Hey you</p> <p id="ya">Ya you!</p></div>');
        $this->assertEquals('Ya you!', $dom->getElementById('hey')->nextSibling()->text);
    }

    public function testConfigLocalOverride()
    {
        $dom = new Dom;
        $dom->setOptions([
            'whitespaceTextNode' => false,
        ]);
        $dom->load('<div><p id="hey">Hey you</p> <p id="ya">Ya you!</p></div>', [
            'whitespaceTextNode' => true,
        ]);
        $this->assertEquals(' ', $dom->getElementById('hey')->nextSibling()->text);
    }
}
