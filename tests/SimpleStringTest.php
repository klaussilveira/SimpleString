<?php
require_once 'SimpleString.class.php';

class SimpleStringTest extends PHPUnit_Framework_TestCase {


	/**
	 * Testing the code of demo.php
	 * 
	 * @access public
	 */
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


	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing the regular methods.
	 * 
	 * @access public
	 */
	public function testOverloadsWithCall_Regular(){
		//tolower
		$string = new SimpleString('Lorem Ipsum Dolor');
		$string->tolower();
		$this->assertEquals('lorem ipsum dolor', $string->__toString());

		//toupper
		$string = new SimpleString('Lorem Ipsum Dolor');
		$string->toupper();
		$this->assertEquals('LOREM IPSUM DOLOR', $string->__toString());

		//substr
		$string = new SimpleString('Lorem Ipsum Dolor');
		$string->substr(4,10);
		$this->assertEquals('m Ipsum Do', $string->__toString());
	}

	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing mathods that have a different input data order.
	 * 
	 * @access public
	 */
	public function testOverloadsWithCall_Different(){

		//replace
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->replace('lorem', 'mortem');
		$this->assertEquals('Lorem ipsum dolor sit amet mortem ipsum', $string->__toString());

		//ireplace
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->ireplace('lorem', 'mortem');
		$this->assertEquals('mortem ipsum dolor sit amet mortem ipsum', $string->__toString());

		//preg_replace
		$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
		$string->preg_replace('/lorem/', 'mortem');
		$this->assertEquals('Lorem ipsum dolor sit amet mortem ipsum', $string->__toString());
	}

	//////////////////////////////////////////////////////////////
	//TODO: Using one function to test each case is tooooo bad! :/
	//Need some way to change that
	/////////////////////////////////////////////////////////////

	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing a method that does not exists.
	 * 
	 * @access public
	 *
	 * @expectedException BadMethodCallException
	 */
	public function testOverloadsWithCall_Invalid(){
		$string = new SimpleString('lorem ipsum dolor sit amet lorem ipsum');
		$string->naoExiste();
	}

	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing the Explode method.
	 * 
	 * @access public
	 *
	 * @expectedException BadMethodCallException
	 */
	public function testOverloadsWithCall_Explode(){
		$string = new SimpleString('lorem ipsum dolor sit amet lorem ipsum');
		$string->explode();
	}

	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing the Split method.
	 * 
	 * @access public
	 *
	 * @expectedException BadMethodCallException
	 */
	public function testOverloadsWithCall_Split(){
		$string = new SimpleString('lorem ipsum dolor sit amet lorem ipsum');
		$string->split();
	}

}
