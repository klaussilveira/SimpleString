<?php

namespace Simple\Type\String;

trait Normalization
{
    /**
     * Removes all non-alpha characters in a string
     *
     * @return Simple\Type\String String with non-alpha characters removed
     */
    public function removeNonAlpha()
    {
        $nonAlpha = preg_replace('/[^a-zA-Z\s]/', '', $this->string);

        return $this->valueOf($nonAlpha);
    }

    /**
     * Removes all non-alphanumeric characters in a string
     *
     * @return Simple\Type\String String with non-alphanumeric characters removed
     */
    public function removeNonAlphanumeric()
    {
        $nonAlphanumeric = preg_replace('/[^a-zA-Z0-9\s]/', '', $this->string);

        return $this->valueOf($nonAlphanumeric);
    }

    /**
     * Removes all non-numeric characters in a string
     *
     * @return Simple\Type\String String with non-numeric characters removed
     */
    public function removeNonNumeric()
    {
        $nonNumeric = preg_replace('/[^0-9\s]/', '', $this->string);

        return $this->valueOf($nonNumeric);
    }

    /**
     * Removes all duplicate words in a string
     *
     * @return Simple\Type\String String with duplicate words removed
     */
    public function removeDuplicates()
    {
        $string = explode(' ', $this->string);
        $string = array_unique($string);
        $duplicates = implode(' ', $string);

        return $this->valueOf($duplicates);
    }

    /**
     * Removes all delimiters in a string
     *
     * @return Simple\Type\String String with delimiters removed
     */
    public function removeDelimiters()
    {
        $delimiters = array(
            ' ',
            '-',
            ',',
            '.',
            '?',
            '!',
        );

        $string = str_replace($delimiters, '', $this->string);

        return $this->valueOf($string);
    }

    /**
    * Removes smart quotes from MS Word
    *
    * @link http://shiflett.org/blog/2005/oct/convert-smart-quotes-with-php
    * @link http://www.toao.net/48-replacing-smart-quotes-and-em-dashes-in-mysql
    *
    * @access public
    */
    public function removeSmartQuotes()
    {
        $utf8_search = array(
            "\xe2\x80\x98",
            "\xe2\x80\x99",
            "\xe2\x80\x9c",
            "\xe2\x80\x9d",
            "\xe2\x80\x93",
            "\xe2\x80\x94",
            "\xe2\x80\xa6"
        );

        $utf8_replace = array(
            "'",
            "'",
            '"',
            '"',
            '-',
            '--',
            '...'
        );

        // Replace UTF8 first
        $string = str_replace($utf8_search, $utf8_replace, $this->string);

        $search = array(
            chr(145),
            chr(146),
            chr(147),
            chr(148),
            chr(150),
            chr(151),
            chr(133),
            chr(208),
            chr(210),
            chr(211)
        );

        $replace = array(
            "'",
            "'",
            '"',
            '"',
            '-',
            '-',
            '...',
            '-',
            '"',
            '"'
        );

        $string = str_replace($search, $replace, $string);

        return $this->valueOf($string);
    }
}
