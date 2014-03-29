<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringConversionTest extends \PHPUnit_Framework_TestCase
{
    public function testIsConvertingToLowerCase()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->toLowerCase();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('lorem ipsum dolor', $result->toString());
    }

    public function testIsConvertingToUpperCase()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->toUpperCase();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('LOREM IPSUM DOLOR', $result->toString());
    }

    public function testIsConvertingToSentenceCase()
    {
        $string = new String('LOREM IPSUM DOLOR');
        $result = $string->toSentenceCase();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ipsum dolor', $result->toString());
    }

    public function testIsConvertingToTitleCase()
    {
        $string = new String('LOREM IPSUM DOLOR');
        $result = $string->toTitleCase();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem Ipsum Dolor', $result->toString());
    }

    public function testIsConvertingToUnderscores()
    {
        $string = new String('lorem ipsum dolor');
        $result = $string->toUnderscores();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('lorem_ipsum_dolor', $result->toString());
    }

    public function testIsConvertingToCamelCase()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->toCamelCase();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('loremIpsumDolor', $result->toString());
    }

    public function testIsConvertingToCleanUrl()
    {
        $string = new String('Your mother is so ugly, glCullFace always returns TRUE.');
        $result = $string->toCleanUrl();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('your-mother-is-so-ugly-glcullface-always-returns-true', $result->toString());

        $string = new String('Your mother is so ugly, glCullFace always returns TRUE.');
        $result = $string->toCleanUrl('_');

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('your_mother_is_so_ugly_glcullface_always_returns_true', $result->toString());

        $string = new String('Acentos serão reconhecidos e substituídos.');
        $result = $string->toCleanUrl();

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('acentos-serao-reconhecidos-e-substituidos', $result->toString());
    }
}
