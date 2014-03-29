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
}
