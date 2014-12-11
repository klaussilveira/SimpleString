<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringOverloadTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCallingToLower()
    {
        $string = new String('LECHUGA IPSUM DOLOR');
        $result = $string->tolower();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('lechuga ipsum dolor', $result->toString());
    }

    public function testIsCallingSubstr()
    {
        $string = new String('Lechuga Ipsum Dolor');
        $result = $string->substr(6, 10);

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('a Ipsum Do', $string->toString());
    }

    /**
    * Testing removeSmartQuotes method
    *
    * This test covers removing smart quotes from the string
    */
    public function testRemoveSmartQuotes()
    {
        $string = new String('“Some–string“');
        $result = $string->removeSmartQuotes();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('"Some-string"', $string->toString());
    }
}
