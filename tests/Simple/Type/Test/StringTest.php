<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testIsGettingLength()
    {
        $string = new String('abcdef');
        $this->assertEquals(6, $string->length());

        $string = new String('');
        $this->assertEquals(0, $string->length());
    }

    public function testIsGettingCharacterAtPosition()
    {
        $string = new String('abcdef');
        $this->assertEquals('b', $string->charAt(1));
        $this->assertEquals('d', $string->charAt(3));
        $this->assertEquals('f', $string->charAt(5));
    }

    /**
     * @expectedException Simple\Type\Exception\IndexOutOfBoundsException
     */
    public function testIsNotGettingCharacterOutOfRange()
    {
        $string = new String('abcdef');
        $this->assertEquals('b', $string->charAt(10));
    }

    /**
     * @expectedException Simple\Type\Exception\IndexOutOfBoundsException
     */
    public function testIsNotGettingCharacterAtNegativeIndex()
    {
        $string = new String('abcdef');
        $this->assertEquals('b', $string->charAt(-1));
    }

    public function testIsEmpty()
    {
        $string = new String('abcdef');
        $this->assertEquals(false, $string->isEmpty());

        $string = new String('');
        $this->assertEquals(true, $string->isEmpty());
    }
}
