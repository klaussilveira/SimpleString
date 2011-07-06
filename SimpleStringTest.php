<?php

require_once 'PHPUnit/Framework.php';
require_once 'SimpleString.class.php';

class SimpleStringTest extends PHPUnit_Framework_TestCase {

	public function testDemo(){
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->shorten(10);
		$this->assertEquals('Lorem ipsu', $string->__toString());
		

	}


}
