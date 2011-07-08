<?php
require_once 'SimpleString.class.php';

class SimpleStringTest extends PHPUnit_Framework_TestCase {


	public function testDemo(){
		//Cumulative changes
		$string = new SimpleString('lorem ipsum dolor sit amet lorem ipsum');
		$string->shorten(10);
		$this->assertEquals('lorem ipsu', $string->__toString());
		$string->toSentenceCase();
		$this->assertEquals('Lorem ipsu', $string->__toString());
		
		//Using the returned new SimpleString
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string=$string->shorten(15);
		$this->assertEquals('Lorem ipsum dol', $string->__toString());
		$string=$string->toCamelCase();
		$this->assertEquals('loremIpsumDol', $string->__toString());

		//Overloaded functions
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->tolower()->replace('lorem', 'mortem');
		$this->assertEquals('mortem ipsum dolor sit amet mortem ipsum', $string->__toString());
	}


}
