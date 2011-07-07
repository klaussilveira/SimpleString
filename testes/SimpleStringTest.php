<?php
require_once 'SimpleString.class.php';

class SimpleStringTest extends PHPUnit_Framework_TestCase {

	public function testDemo(){
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->shorten(10);
		$this->assertEquals('Lorem ipsu', $string->__toString());
		$string->toSentenceCase();
		$this->assertEquals('Lorem ipsu', $string->__toString());
		
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->shorten(15);
		$this->assertEquals('Lorem ipsum dol', $string->__toString());
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->tolower();
		$this->assertEquals('lorem ipsum dolor sit amet lorem ipsum', $string->__toString());
		$string->replace('lorem', 'mortem');
		$this->assertEquals('mortem ipsum dolor sit amet mortem ipsum', $string->__toString());
	}


}
