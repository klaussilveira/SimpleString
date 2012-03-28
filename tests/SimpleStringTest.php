<?php

require_once 'SimpleString.php';

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
    public function testIsDemoWorkingCorrectly()
    {
        // Cumulative changes
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->shorten(10);
        $this->assertEquals('lorem ipsu', $string->__toString());
        $string->toSentenceCase();
        $this->assertEquals('Lorem ipsu', $string->__toString());
        
        // Using the returned new SimpleString
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string = $string->shorten(15);
        $this->assertEquals('Lorem ipsum dol', $string->__toString());
        $string = $string->toCamelCase();
        $this->assertEquals('loremIpsumDol', $string->__toString());

        // Overloaded functions
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->tolower()->replace('lorem', 'mortem');
        $this->assertEquals('mortem ipsum dolor lechuga amet mortem ipsum', $string->__toString());
    }
    
    public function testAppend()
    {
        $string = new SimpleString('ipsum Lechuga amet');
        $string->append(" lorem");
        $this->assertEquals('ipsum Lechuga amet lorem', $string->__toString());
    }

    public function testPrepend()
    {
        $string = new SimpleString('ipsum Lechuga amet lorem');
        $string->prepend("Lorem ");
        $this->assertEquals('Lorem ipsum Lechuga amet lorem', $string->__toString());
    }

    public function testChop()
    {
        $string = new SimpleString('Lorem ipsum Lechuga amet lorem');
        $string->chop();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());
    }

    public function testShorten()
    {
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');
        $string->shorten(27);
        $this->assertEquals('Lorem ipsum Lechuga amet lo', $string->__toString());
        $string->shorten(22, true);
        $this->assertEquals('Lorem ipsum Lechuga', $string->__toString());

        $newString = new SimpleString('Lorem ipsum Lechuga');
        $newString->shorten(3, true);
        $this->assertEquals('', $newString->__toString());

        $newString = new SimpleString('Lorem ipsum Lechuga');
        $newString->shorten(6, true);
        $this->assertEquals('Lorem', $newString->__toString());
    }

    public function testReverse()
    {
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');
        $string->reverse();
        $this->assertEquals('erol tema aguhceL muspi meroL', $string->__toString());
        $string->reverse();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());
    }

    public function testScramble()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testShuffle()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testSeo()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testEmphasize()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testCensor()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToLowerCase()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToUpperCase()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToSentenceCase()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToTitleCase()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToUnderscores()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testToCamelCase()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRemoveNonAlpha()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRemoveNonAlphanumeric()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRemoveNonNumeric()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRemoveDuplicates()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testRemoveDelimiters()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testIntersect()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testLenght()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testWords()
    {
        $string = new SimpleString('Lorem ipsum Lechuga amet lore');
        $this->assertEquals(5, $string->words());
        
        $string = new SimpleString('Lorem');
        $this->assertEquals(1, $string->words());
        
        $string = new SimpleString('    ');
        $this->assertEquals(0, $string->words());
    }

    public function testContains()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    public function testFluentInterface()
    {
        $string = new SimpleString('ipsum Lechuga amet');
        $string->append(" lorem")->prepend("Lorem ")->chop()->reverse()->reverse();
        $this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());
    }
    
    /**
     * Testing regular overloaded method calls
     * 
     * This test case covers methods that have a normal parameter order.
     */
    public function testOverloadedMethods()
    {
        // strtolower
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->tolower();
        $this->assertEquals('lechuga ipsum dolor', $string->__toString());

        // strtoupper
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->toupper();
        $this->assertEquals('LECHUGA IPSUM DOLOR', $string->__toString());

        // substr
        $string = new SimpleString('Lechuga Ipsum Dolor');
        $string->substr(6, 10);
        $this->assertEquals('a Ipsum Do', $string->__toString());
    }

    /**
     * Testing "different" overloaded method calls
     * 
     * This test case covers methods that have a different parameter order.
     */
    public function testDifferentOverloadedMethods()
    {
        // str_replace
        $string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->replace('lorem', 'mortem');
        $this->assertEquals('Lorem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());

        // str_ireplace
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
     * @expectedException BadMethodCallException
     */
    public function testUnexistingOverloadedMethods()
    {
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->naoExiste();
    }

    /**
     * Testing invalid method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that don't return strings, therefore are invalid.
     * 
     * @expectedException BadMethodCallException
     */
    public function testInvalidOverloadedMethodExplode()
    {
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->explode();
    }

    /**
     * Testing invalid method calls
     * 
     * Testing overloaded methods using __call. This test case covers 
     * methods that don't return strings, therefore are invalid.
     * 
     * @expectedException BadMethodCallException
     */
    public function testInvalidOverloadedMethodSplit()
    {
        $string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
        $string->split();
    }

}
