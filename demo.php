<?php

require('SimpleString.class.php');

$string = new SimpleString('Lorem ipsum dolor sit amet lorem ipsum');
$string->shorten(10);
$string->toSentenceCase();
echo $string;

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
