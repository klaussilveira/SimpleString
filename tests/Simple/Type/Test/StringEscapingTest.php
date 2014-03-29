<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringEscapingTest extends \PHPUnit_Framework_TestCase
{
    public function testIsEscapingHtml()
    {
        $string = new String('<h1>Lorem ipsum dolor</h1>');
        $result = $string->escapeHtml();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('&lt;h1&gt;Lorem ipsum dolor&lt;/h1&gt;', $result->toString());
    }

    public function testIsEscapingUrl()
    {
        $string = new String('Lorem! Ipsum! $dolor');
        $result = $string->escapeUrl();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem%21+Ipsum%21+%24dolor', $result->toString());
    }
}
