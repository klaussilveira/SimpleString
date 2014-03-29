<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringManipulationTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAppending()
    {
        $string = new String('ipsum Dolor amet');
        $result = $string->append(" lorem");

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('ipsum Dolor amet lorem', $result->toString());
    }

    public function testIsPrepending()
    {
        $string = new String('ipsum Dolor amet lorem');
        $result = $string->prepend("Lorem ");

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ipsum Dolor amet lorem', $result->toString());
    }

    public function testIsChopping()
    {
        $string = new String('Lorem ipsum Dolor amet lorem');
        $result = $string->chop();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ipsum Dolor amet lore', $result->toString());
    }

    public function testIsShortening()
    {
        $string = new String('Lorem ipsum dolor sit amet nepet quisquam');
        $result = $string->shorten(10);
        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ipsu', $result->toString());

        $result = $string->shorten(10, true);
        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem', $result->toString());

        $string = new String('Lorem ipsum Dolor');
        $result = $string->shorten(3, true);
        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('', $result->toString());

        $string = new String('Lorem ipsum Dolor');
        $result = $string->shorten(6, true);
        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem', $result->toString());
    }

    public function testIsReversing()
    {
        $string = new String('Lorem ipsum Dolor amet lore');
        $result = $string->reverse();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('erol tema roloD muspi meroL', $result->toString());

        $normal = $result->reverse();
        $this->assertInstanceOf('Simple\\Type\\String', $normal);
        $this->assertEquals('Lorem ipsum Dolor amet lore', $normal->toString());
    }

    public function testIsScrambling()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->scramble();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertRegExp('/[Lorem]+ [ipsum]+ [dolor]+/', $result->toString());
    }

    public function testIsShuffling()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->shuffle();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertRegExp('/[Loremipsudl ]+/', $result->toString());
    }

    public function testIsIntersectingStrings()
    {
        $string = new String('Lorem ipsum dolor sit amet');
        $result = $string->intersect('Avis sit amet nepet quisquam');

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('sit amet', $result->toString());
    }

    public function testIsCountingWords()
    {
        $string = new String('Lorem ipsum Dolor amet lore');
        $this->assertEquals(5, $string->words());

        $string = new String('Lorem');
        $this->assertEquals(1, $string->words());

        $string = new String('    ');
        $this->assertEquals(0, $string->words());
    }
}
