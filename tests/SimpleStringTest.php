<?php

require_once 'SimpleString.class.php';

/**
* SimpleStringTest
*
* Implementation of a SimpleString test case using PHPUnit
*
* @author Thiago Lechuga <thiagoalz@gmail.com>
* @package simplestring
* @license http://www.opensource.org/licenses/bsd-license.php BSD License
* @version 0.1
* @todo Using one function for each test case is evil, need to fix this
*/
class SimpleStringTest extends PHPUnit_Framework_TestCase
{
    /**
     * Testing the code of demo.php
     * 
     * @access public
     */
    public function testDemo() {
        // Cumulative changes
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->shorten(10);
        $this->assertEquals('lorem ipsu', $string->__toString());
        $string->toSentenceCase();
        $this->assertEquals('Lorem ipsu', $string->__toString());
        
        // Using the returned new SimpleString
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string=$string->shorten(15);
        $this->assertEquals('Lorem ipsum dol', $string->__toString());
        $string=$string->toCamelCase();
        $this->assertEquals('loremIpsumDol', $string->__toString());

        // Overloaded functions
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->tolower()->replace('lorem', 'mortem');
        $this->assertEquals('mortem ipsum dolor lechuga amet mortem ipsum', $string->__toString());
    }

    /**
     * Testing custom methods
     * 
     * @access public
     * @todo Cover more custom methods
     * @todo Maybe break the whole thing with more tests?
     */
    public function testCreatedMethods() {
        // append
        $string = new SimpleString('ipsum Lechuga amet');
        $string->append(" lorem");
        $this->assertEquals('ipsum Lechuga amet lorem', $string->__toString());

        // prepend
        $string = new SimpleString('ipsum Lechuga amet lorem');
        $string->prepend("Lorem ");
        $this->assertEquals('Lorem ipsum Lechuga amet lorem', $string->__toString());

        // chop
        $string = new SimpleString('Lorem ipsum Lechuga amet lorem');
        $string->chop();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());

        // reverse
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');
        $string->reverse();
        $this->assertEquals('erol tema aguhceL muspi meroL', $string->__toString());
        $string->reverse();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());

        // words
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');        
        $this->assertEquals(5, $string->words());
        $string = new SimpleString('Lorem');        
        $this->assertEquals(1, $string->words());
        $string = new SimpleString('    ');        
        $this->assertEquals(0, $string->words());    

        // shorten
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');
        $string->shorten(27);
        $this->assertEquals('Lorem ipsum Lechuga amet lo', $string->__toString());
        $string->shorten(22, true);
        $this->assertEquals('Lorem ipsum Lechuga', $string->__toString());

        $newString=new SimpleString('Lorem ipsum Lechuga');
        $newString->shorten(3, true);
        $this->assertEquals('', $newString->__toString());

        $newString=new SimpleString('Lorem ipsum Lechuga');
        $newString->shorten(6, true);
        $this->assertEquals('Lorem', $newString->__toString());
    }

    /**
     * Testing custom methods using the fluent interface
     * 
     * @access public
     */
    public function testCreatedMethodsChain() {
        $string = new SimpleString('ipsum Lechuga amet');
        $string->append(" lorem")->prepend("Lorem ")->chop()->reverse()->reverse();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());
    }

    /**
     * Testing regular method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * regular methods.
     * 
     * @access public
     */
    public function testOverloadsWithCall_Regular() {
        // tolower
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->tolower();
        $this->assertEquals('lechuga ipsum dolor', $string->__toString());

        // toupper
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->toupper();
        $this->assertEquals('LECHUGA IPSUM DOLOR', $string->__toString());

        // substr
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->substr(6, 10);
        $this->assertEquals('a Ipsum Do', $string->__toString());
    }

    /**
     * Testing "different" method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that have a different parameter order.
     * 
     * @access public
     */
    public function testOverloadsWithCall_Different() {
        // replace
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->replace('lorem', 'mortem');
        $this->assertEquals('Lorem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());

        // ireplace
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->ireplace('lorem', 'mortem');
        $this->assertEquals('mortem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());

        // preg_replace
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->preg_replace('/lorem/', 'mortem');
        $this->assertEquals('Lorem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());
    }
    
    /**
     * Testing calls to methods that don't exist
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that don't exist.
     * 
     * @access public
     * @expectedException BadMethodCallException
     */
    public function testOverloadsWithCall_Invalid(){
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->naoExiste();
    }

    /**
     * Testing invalid method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that don't return strings, therefore are invalid.
     * 
     * @access public
     * @expectedException BadMethodCallException
     */
    public function testOverloadsWithCall_Explode(){
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->explode();
    }

    /**
     * Testing invalid method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that don't return strings, therefore are invalid.
     * 
     * @access public
     * @expectedException BadMethodCallException
     */
    public function testOverloadsWithCall_Split(){
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->split();
    }

}
