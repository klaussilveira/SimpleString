# SimpleString
A small library for string manipulation with PHP. SimpleString uses method overloading to create an object-oriented interface for the built-in string functions in PHP. It implements a fluent interface, improving how we manipulate strings, and extends functionality by providing common implementations. It also aims to eliminate the problems of unorganized function names.

SimpleString also uses overloading to create an object-oriented interface for built-in string functions. Functions starting with str or str_ can just be used with their actual name, not prefix. So: strtolower = tolower, str_replace = replace. Functions whose return values are not string are invalid and will throw exceptions. 

## Authors and contributors
* [Klaus Silveira](http://www.klaussilveira.com) (Creator, developer, support)
* [Thiago Lechuga] (Developer)
* [Gusto Maia] (Developer)

## License
[New BSD license](http://www.opensource.org/licenses/bsd-license.php)

## Todo
* add more functionality, but keep the library simple and easy to use (loyal to it's name)
* create a better documentation (detail every method)
* error handling can, and should, be improved (throw decent exceptions)
* test, test, test (unit tests, of course!)

## Using SimpleString
The idea behind SimpleString is to keep things very easy to use, while giving lot's of power to the user. Check it out:

```php
<?php 

// Example
$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
$string->shorten(10);
$string->toSentenceCase();
echo $string;

// Fluent interface example
$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
$string->shorten(15)->toCamelCase();
echo $string;

/**
 * SimpleString also uses overloading to create an object-oriented
 * interface for built-in string functions. Functions starting with
 * str or str_ can just be used with their actual name, not prefix.
 * 
 * So: strtolower = tolower, str_replace = replace.
 * 
 * Functions whose return values are not string are invalid and will 
 * throw exceptions. 
 */
$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
$string->tolower()->replace('lorem', 'mortem');
echo $string;


```
