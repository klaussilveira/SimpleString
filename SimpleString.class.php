<?php
/**
* SimpleString
*
* A small library for string manipulation with PHP. 
* 
* SimpleString uses method overloading to create an object-oriented 
* interface for the built-in string functions in PHP. It implements a
* fluent interface, improving how we manipulate strings, and extends
* functionality by providing common implementations. It also aims to 
* eliminate the problems of unorganized function names.
*
* @author Klaus Silveira <contact@klaussilveira.com>
* @package simplestring
* @license http://www.opensource.org/licenses/bsd-license.php BSD License
* @version 0.1
*/
class SimpleString {
	
	/**
	 * String value that we'll be manipulating
	 * 
	 * @var string
	 */
	private $string;
	
	/**
	 * Object instantiation and encapsulation of the string value
	 * 
	 * @access public
	 * @param string $string String value that will be manipulated
	 */
	public function __construct($string) {
		$this->string = $string;
	}
	
	/**
	 * Overloading in order to create an object-oriented interface for
	 * built-in PHP string functions.
	 * 
	 * @access public
	 * @param string $name Name of the method being called
	 * @param array $arguments Arguments being passed to the method
	 */
	public function __call($name, $arguments) {
		/**
		 * List of built-in functions that have the haystack after everything else
		 */
		$different = array(
			'str_replace',
			'str_ireplace',
			'preg_replace',
			'preg_filter',
			'preg_replace_callback',
		);
		
		/**
		 * List of built-in functions that return arrays, not strings, therefore invalid
		 */
		$invalid = array(
			'explode',
			'split',
			'str_split',
			'preg_split',
			'preg_match',
			'preg_match_all',
		);
		
		/**
		 * Once we receive the method through overloading, we check the built-in function
		 * existance and if it has a str or str_ prefix, if it does, we need to fix it
		 */
		if(function_exists("str$name")) {
			$name = "str$name";
		} elseif(function_exists("str_$name")) {
			$name = "str_$name";
		} elseif(!function_exists($name)) {
			throw new BadMethodCallException('Function does not exist.');
			return false;
		} 
		
		/**
		 * If our built-in function is invalid, meaning that it doesn't return a string, we throw an exception and leave
		 */
		if(in_array($name, $invalid)) {
			throw new BadMethodCallException('Function does not returns a string, while SimpleString only works with string return values.');
			return false;
		}
		
		/**
		 * If our built-in function is different, meaning that it has different parameter order, we change the order
		 */
		if(in_array($name, $different)) {
			$arguments = array_merge($arguments, array($this->string));
		} else {
			$arguments = array_merge(array($this->string), $arguments);
		}
		
		/**
		 * Call the built-in function and put it's return into our string property
		 */
		$this->string = call_user_func_array($name, $arguments);
		
		return $this;
    }
    
    /**
     * Inserts a string at the end of another string
     * 
     * @access public
     * @param string $name String to be appended
     */
    public function append($string) {
    	$this->string .= $string;
    	
    	return $this;
	}
	
	/**
	 * Inserts a string at the beginning of another string
	 * 
	 * @access public
	 * @param string $name String to be prepended
	 */
	public function prepend($string) {
    	$this->string = $string . $this->string;
    	
    	return $this;
	}
	
	/**
	 * Removes the last character from a string
	 * 
	 * @access public
	 */
	public function chop() {
    	$this->string = substr($this->string, 0, -1);
    	
    	return $this;
	}
	
	/**
	 * Shortens a string to a fixed limit
	 * 
	 * @access public
	 * @param int $limit Limit of characters
	 * @param boolean $round (optional) Round to the last word and don't cut words
	 */
	public function shorten($limit, $round = false) {
		if(strlen($this->string) >= $limit) {
			$this->string = substr($this->string, 0, $limit);
			
			if($round) {
				$word = strrpos($this->string, ' ');
				$this->string = substr($this->string, 0, $word);
			}
		}
		
		return $this;
	}
	
	/**
	 * Reverses a string
	 * 
	 * @access public
	 */
	public function reverse() {
		$string = str_split($this->string);
		$string = array_reverse($string);
		$this->string = implode($string);
		
		return $this;
	}
	
	/**
	 * Scrambles all words in a string
	 * 
	 * @access public
	 */
	public function scramble() {
		$string = explode(' ', $this->string);
		
		foreach($string as &$word) {
			$word = str_shuffle($word);
		}
		
		$this->string = implode(' ', $string);
		
		return $this;
	}
	
	/**
	 * Shuffles all characters in a string
	 * 
	 * @access public
	 */
	public function shuffle() {
		$this->string = str_shuffle($this->string);
		
		return $this;
	}
	
	/**
	 * Cleans and optimizes the string to be search engine friendly (SEO)
	 * 
	 * @access public
	 * @param string $separator (optional) Character that will separe words
	 */
	public function seo($separator = '-'){
		$accents = array('Š' => 'S', 'š' => 's', 'Ð' => 'Dj','Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss','à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f');
		$this->string = strtr($this->string, $accents);
		$this->string = strtolower($this->string);
		$this->string = preg_replace('/[^a-zA-Z0-9\s]/', '', $this->string);
		$this->string = preg_replace('{ +}', ' ', $this->string);
		$this->string = trim($this->string);
		$this->string = str_replace(' ', $separator, $this->string);
		
		return $this;
	}
	
	/**
	 * Emphasizes certain words or characters in a string using an HTML tag
	 * 
	 * @access public
	 * @param string|array $targets Words or characters to be emphasized
	 * @param string $rule HTML tag that will be used for emphasis (e.g: strong, em)
	 */
	public function emphasize($targets, $rule) {
		if(is_array($targets)) {
			foreach($targets as $target) {
				$this->string = str_replace($target, "<{$rule}>{$target}</{$rule}>", $this->string);
			}
		} else {
			$this->string = str_replace($targets, "<{$rule}>{$targets}</{$rule}>", $this->string);	
		}
		
		return $this;
	}
	
	/**
	 * Censors certain words or characters in a string and replaces them with a *
	 * 
	 * @access public
	 * @param string|array $targets Words or characters to be censored
	 */
	public function censor($words) {
		if(is_array($words)) {
			foreach($words as $word) {
				foreach(str_split($word) as $letter) {
					$censor[] = '*';
				}
				$this->string = str_replace($word, implode($censor), $this->string);
			}
		} else {
			$this->string = str_replace($words, "*", $this->string);	
		}
		
		return $this;
	}
	
	/**
	 * Converts the string to lowercase (e.g: lorem ipsum dolor)
	 * 
	 * @access public
	 */
	public function toLowerCase() {
		$this->string = strtolower($this->string);
		
		return $this;
	}
	
	/**
	 * Converts the string to uppercase (e.g: LOREM IPSUM DOLOR)
	 * 
	 * @access public
	 */
	public function toUpperCase() {
		$this->string = strtoupper($this->string);
		
		return $this;
	}
	
	/**
	 * Converts the string to sentence case (e.g: Lorem ipsum dolor)
	 * 
	 * @access public
	 */
	public function toSentenceCase() {
		$this->toLowerCase();
		$this->string = ucfirst($this->string);
		
		return $this;
	}
	
	/**
	 * Converts the string to title case (e.g: Lorem Ipsum Dolor)
	 * 
	 * @access public
	 */
	public function toTitleCase() {
		$this->toLowerCase();
		$this->string = ucwords($this->string);
		
		return $this;
	}
	
	/**
	 * Converts the spaces in string to underscores and lowercases the string (e.g: lorem_ipsum_dolor)
	 * 
	 * @access public
	 */
	public function toUnderscores() {
		$this->toLowerCase();
		$this->string = str_replace(' ', '_', $this->string);
		
		return $this;
	}
	
	/**
	 * Converts the string to camel case (e.g: loremIpsumDolor)
	 * 
	 * @access public
	 */
	public function toCamelCase() {
		$this->string = ucwords($this->string);
		$this->string = str_replace(' ', '', $this->string);
		$this->string[0] = strtolower($this->string[0]);
		
		return $this;
	}
	
	/**
	 * Removes all non-alpha characters in a string
	 * 
	 * @access public
	 */
	public function removeNonAlpha() {
		$this->string = preg_replace('/[^a-zA-Z\s]/', '', $this->string);
		
		return $this;
	}
	
	/**
	 * Removes all non-alphanumeric characters in a string
	 * 
	 * @access public
	 */
	public function removeNonAlphanumeric() {
		$this->string = preg_replace('/[^a-zA-Z0-9\s]/', '', $this->string);
		
		return $this;
	}
	
	/**
	 * Removes all non-numeric characters in a string
	 * 
	 * @access public
	 */
	public function removeNonNumeric() {
		$this->string = preg_replace('/[^0-9\s]/', '', $this->string);
		
		return $this;
	}
	
	/**
	 * Removes all duplicate words in a string
	 * 
	 * @access public
	 */
	public function removeDuplicates() {
		$string = explode(' ', $this->string);
		$string = array_unique($string);
		$this->string = implode(' ', $string);
		
		return $this;
	}
	
	/**
	 * Removes all delimiters in a string
	 * 
	 * @access public
	 */
	public function removeDelimiters() {
		$delimiters = array(
			' ',
			'-',
			',',
			'.',
			'?',
			'!',
		);
		
		$this->string = str_replace($delimiters, '', $this->string);
		
		return $this;
	}
	
	/**
	 * Gives the intersection of two strings
	 * 
	 * @access public
	 * @param string $words String to be intersected
	 */
	public function intersect($words) {
		$string = explode(' ', $this->string);
		$words = explode(' ', $words);
		$intersection = array_intersect($string, $words);
		$this->string = implode(' ', $intersection);
		
		return $this;
	}
	
	/**
	 * Returns the lenght of a string
	 * 
	 * @access public
	 * @return int String lenght
	 */
	public function lenght() {
		return strlen($this->string);
	}
	
	/**
	 * Returns the number of words of a string
	 * 
	 * @access public
	 * @return int Word count
	 */
	public function words() {
		return str_word_count($this->string);
	}
	
	/**
	 * Checks if a string contains another one
	 * 
	 * @access public
	 * @param string $string String to be checked
	 * @return boolean False if it does not contain, true if it does
	 */
	public function contains($string) {
		if (strpos($this->string, $string) === false) {
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * Returns our manipulated string when the object is echoed
	 */
	public function __toString() {
		return $this->string;
	}
}
