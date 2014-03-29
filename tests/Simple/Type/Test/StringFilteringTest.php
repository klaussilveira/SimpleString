<?php

namespace Simple\Type\Test;

use Simple\Type\String;

class StringFilteringTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCensoring()
    {
        $string = new String('Lorem ipsum dolor');
        $result = $string->censor('ipsum');

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('Lorem ***** dolor', $result->toString());

        $string = new String('Lorem ipsum dolor');
        $result = $string->censor(array('Lorem', 'dolor'));

        $this->assertInstanceOf('Simple\\Type\\String', $result);
        $this->assertEquals('***** ipsum *****', $result->toString());
    }
}
