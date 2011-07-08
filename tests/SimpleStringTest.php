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
		$string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->shorten(10);
		$this->assertEquals('lorem ipsu', $string->__toString());
		$string->toSentenceCase();
		$this->assertEquals('Lorem ipsu', $string->__toString());
		
		//Using the returned new SimpleString
		$string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
		$string=$string->shorten(15);
		$this->assertEquals('Lorem ipsum dol', $string->__toString());
		$string=$string->toCamelCase();
		$this->assertEquals('loremIpsumDol', $string->__toString());

		//Overloaded functions
		$string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->tolower()->replace('lorem', 'mortem');
		$this->assertEquals('mortem ipsum dolor lechuga amet mortem ipsum', $string->__toString());
	}


	/**
	 * Testing created methods
	 * 
	 * @access public
	 */
	public function testCreatedMethods(){	
		//TODO: Cover more methods!
		//TODO: Break it on more tests?
	
		//append
		$string = new SimpleString('ipsum Lechuga amet');
		$string->append(" lorem");
		$this->assertEquals('ipsum Lechuga amet lorem', $string->__toString());

		//prepend
		$string = new SimpleString('ipsum Lechuga amet lorem');
		$string->prepend("Lorem ");
		$this->assertEquals('Lorem ipsum Lechuga amet lorem', $string->__toString());

		//chop
		$string = new SimpleString('Lorem ipsum Lechuga amet lorem');
		$string->chop();
		$this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());

		//reverse
		$string = new SimpleString('Lorem ipsum Lechuga amet lore');
		$string->reverse();
		$this->assertEquals('erol tema aguhceL muspi meroL', $string->__toString());
		$string->reverse();
		$this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());


		//words
		$string = new SimpleString('Lorem ipsum Lechuga amet lore');		
		$this->assertEquals(5, $string->words());
		$string = new SimpleString('Lorem');		
		$this->assertEquals(1, $string->words());
		$string = new SimpleString('    ');		
		$this->assertEquals(0, $string->words());	

		//shorten
		$string = new SimpleString('Lorem ipsum Lechuga amet lore');
		$string->shorten(27);
		$this->assertEquals('Lorem ipsum Lechuga amet lo', $string->__toString());
		$string->shorten(22, true);
		$this->assertEquals('Lorem ipsum Lechuga', $string->__toString());

		$newString=new SimpleString('Lorem ipsum Lechuga');
		$newString->shorten(3,true);
		$this->assertEquals('', $newString->__toString());

		$newString=new SimpleString('Lorem ipsum Lechuga');
		$newString->shorten(6,true);
		$this->assertEquals('Lorem', $newString->__toString());
		
	}

	/**
	 * Testing created methods in a chain
	 * 
	 * @access public
	 */
	public function testCreatedMethodsChain(){
		$string = new SimpleString('ipsum Lechuga amet');
		$string->append(" lorem")->prepend("Lorem ")->chop()->reverse()->reverse();
		$this->assertEquals('Lorem ipsum Lechuga amet lore', $string->__toString());
	}





	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing the regular methods.
	 * 
	 * @access public
	 */
	public function testOverloadsWithCall_Regular(){
		//tolower
		$string = new SimpleString('Lechuga Ipsum Dolor');
		$string->tolower();
		$this->assertEquals('lechuga ipsum dolor', $string->__toString());

		//toupper
		$string = new SimpleString('Lechuga Ipsum Dolor');
		$string->toupper();
		$this->assertEquals('LECHUGA IPSUM DOLOR', $string->__toString());

		//substr
		$string = new SimpleString('Lechuga Ipsum Dolor');
		$string->substr(6,10);
		$this->assertEquals('a Ipsum Do', $string->__toString());
	}

	/**
	 * Testing methods that were overloades with the __cal function.
	 * Testing mathods that have a different input data order.
	 * 
	 * @access public
	 */
	public function testOverloadsWithCall_Different(){

		//replace
		$string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->replace('lorem', 'mortem');
		$this->assertEquals('Lorem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());

		//ireplace
		$string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->ireplace('lorem', 'mortem');
		$this->assertEquals('mortem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());

		//preg_replace
		$string = new SimpleString('Lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->preg_replace('/lorem/', 'mortem');
		$this->assertEquals('Lorem ipsum dolor Lechuga amet mortem ipsum', $string->__toString());
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
		$string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
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
		$string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
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
		$string = new SimpleString('lorem ipsum dolor Lechuga amet lorem ipsum');
		$string->split();
	}

}
