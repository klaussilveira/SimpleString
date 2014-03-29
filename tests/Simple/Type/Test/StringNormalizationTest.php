<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringNormalizationTest extends \PHPUnit_Framework_TestCase
{
    public function testIsRemovingNonAlpha()
    {
        $string = new String('Lorem !15@()!@##$*(dolor');
        $result = $string->removeNonAlpha();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem dolor', $result->toString());
    }

    public function testIsRemovingNonAlphanumeric()
    {
        $string = new String('Lorem !15@()!@##$*(dolor');
        $result = $string->removeNonAlphanumeric();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem 15dolor', $result->toString());
    }

    public function testIsRemovingNonNumeric()
    {
        $string = new String('Lorem !15@()!@##$*(dolor');
        $result = $string->removeNonNumeric();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('15', $result->toString());
    }

    public function testIsRemovingDuplicates()
    {
        $string = new String('Lorem ipsum dolor sit amet dolor');
        $result = $string->removeDuplicates();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ipsum dolor sit amet', $result->toString());
    }

    public function testIsRemovingDelimiters()
    {
        $string = new String('Lorem ipsum, dolor sit-amet!');
        $result = $string->removeDelimiters();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Loremipsumdolorsitamet', $result->toString());
    }
}
