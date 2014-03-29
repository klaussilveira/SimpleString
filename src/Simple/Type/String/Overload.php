<?php

namespace Simple\Type\String;

trait Overload
{
    /**
     * Overloading in order to create an object-oriented interface for
     * built-in PHP string functions.
     *
     * @access public
     * @param string $name Name of the method being called
     * @param array $arguments Arguments being passed to the method
     */
    public function __call($name, $arguments)
    {
        /**
         * List of built-in functions that have the
         * haystack after everything else
         */
        $different = array(
            'str_replace',
            'str_ireplace',
            'preg_replace',
            'preg_filter',
            'preg_replace_callback',
        );

        /**
         * List of built-in functions that return arrays, not strings,
         * therefore invalid for our fluent interface
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
         * Once we receive the method through overloading, we check the
         * built-in function and if it has a prefix, we need to fix it
         */
        if (function_exists('mb_str'.$name)) {
            $name = 'mb_str'.$name;
        } elseif (function_exists('mb_str_'.$name)) {
            $name = 'mb_str_'.$name;
        } elseif (function_exists('str'.$name)) {
            $name = 'str'.$name;
        } elseif (function_exists('str_'.$name)) {
            $name = 'str_'.$name;
        } elseif (!function_exists($name)) {
            throw new BadMethodCallException('Function does not exist.');
            return false;
        }

        /**
         * If our built-in function is invalid, meaning that it
         * doesn't return a string, we throw an exception and leave
         */
        if (in_array($name, $invalid)) {
            throw new BadMethodCallException('Function does not returns a string, while SimpleString only works with string return values.');
            return false;
        }

        /**
         * If our built-in function is different, meaning that it
         * has different parameter order, we change the order
         */
        if (in_array($name, $different)) {
            $arguments = array_merge($arguments, array($this->string));
        } else {
            $arguments = array_merge(array($this->string), $arguments);
        }

        /**
         * Call the built-in function and put it's return into
         * our string property
         */
        $this->string = call_user_func_array($name, $arguments);

        return $this;
    }
}
