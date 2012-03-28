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
        $string = new SimpleString('Lorem ipsum dolor');
        $string->scramble();
        $this->assertRegExp('/[Lorem]+ [ipsum]+ [dolor]+/', $string->__toString());
    }

    public function testShuffle()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->shuffle();
        $this->assertRegExp('/[Loremipsudl ]+/', $string->__toString());
    }

    public function testSeo()
    {
        $string = new SimpleString('Your mother is so ugly, glCullFace always returns TRUE.');
        $string->seo();
        $this->assertEquals('your-mother-is-so-ugly-glcullface-always-returns-true', $string->__toString());
        
        $string = new SimpleString('Your mother is so ugly, glCullFace always returns TRUE.');
        $string->seo('_');
        $this->assertEquals('your_mother_is_so_ugly_glcullface_always_returns_true', $string->__toString());
        
        $string = new SimpleString('Acentos serão reconhecidos e substituídos.');
        $string->seo();
        $this->assertEquals('acentos-serao-reconhecidos-e-substituidos', $string->__toString());
    }

    public function testEmphasize()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->emphasize('ipsum', 'strong');
        $this->assertEquals('Lorem <strong>ipsum</strong> dolor', $string->__toString());
        
        $string = new SimpleString('Lorem ipsum dolor');
        $string->emphasize(array('Lorem', 'dolor'), 'em');
        $this->assertEquals('<em>Lorem</em> ipsum <em>dolor</em>', $string->__toString());
    }

    public function testCensor()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->censor('ipsum');
        $this->assertEquals('Lorem ***** dolor', $string->__toString());
        
        $string = new SimpleString('Lorem ipsum dolor');
        $string->censor(array('Lorem', 'dolor'));
        $this->assertEquals('***** ipsum *****', $string->__toString());
    }

    public function testToLowerCase()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->toLowerCase();
        $this->assertEquals('lorem ipsum dolor', $string->__toString());
    }

    public function testToUpperCase()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->toUpperCase();
        $this->assertEquals('LOREM IPSUM DOLOR', $string->__toString());
    }

    public function testToSentenceCase()
    {
        $string = new SimpleString('LOREM IPSUM DOLOR');
        $string->toSentenceCase();
        $this->assertEquals('Lorem ipsum dolor', $string->__toString());
    }

    public function testToTitleCase()
    {
        $string = new SimpleString('LOREM IPSUM DOLOR');
        $string->toTitleCase();
        $this->assertEquals('Lorem Ipsum Dolor', $string->__toString());
    }

    public function testToUnderscores()
    {
        $string = new SimpleString('lorem ipsum dolor');
        $string->toUnderscores();
        $this->assertEquals('lorem_ipsum_dolor', $string->__toString());
    }

    public function testToCamelCase()
    {
        $string = new SimpleString('Lorem ipsum dolor');
        $string->toCamelCase();
        $this->assertEquals('loremIpsumDolor', $string->__toString());
    }

    public function testRemoveNonAlpha()
    {
        $string = new SimpleString('Lorem !15@()!@##$*(dolor');
        $string->removeNonAlpha();
        $this->assertEquals('Lorem dolor', $string->__toString());
    }

    public function testRemoveNonAlphanumeric()
    {
        $string = new SimpleString('Lorem !15@()!@##$*(dolor');
        $string->removeNonAlphanumeric();
        $this->assertEquals('Lorem 15dolor', $string->__toString());
    }

    public function testRemoveNonNumeric()
    {
        $string = new SimpleString('Lorem !15@()!@##$*(dolor');
        $string->removeNonNumeric();
        $this->assertEquals('15', $string->__toString());
    }

    public function testRemoveDuplicates()
    {
        $string = new SimpleString('Lorem ipsum dolor sit amet dolor');
        $string->removeDuplicates();
        $this->assertEquals('Lorem ipsum dolor sit amet', $string->__toString());
    }

    public function testRemoveDelimiters()
    {
        $string = new SimpleString('Lorem ipsum, dolor sit-amet!');
        $string->removeDelimiters();
        $this->assertEquals('Loremipsumdolorsitamet', $string->__toString());
    }

    public function testIntersect()
    {
        $string = new SimpleString('Lorem ipsum dolor sit amet');
        $string->intersect('Avis sit amet nepet quisquam');
        $this->assertEquals('sit amet', $string->__toString());
    }

    public function testLenght()
    {
        $string = new SimpleString('Lorem ipsum dolor sit amet');
        $this->assertEquals(26, $string->lenght());
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
        $string = new SimpleString('Lorem ipsum dolor sit amet');
        $this->assertTrue($string->contains('dolor'));
        $this->assertTrue($string->contains('ipsum'));
        $this->assertTrue($string->contains('sit'));
        $this->assertFalse($string->contains('lorem'));
        $this->assertFalse($string->contains('Avis'));
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
