<?php

namespace Simple\Type\String;

trait Manipulation
{
    /**
     * Inserts a string at the end of another string
     *
     * @param string $string String to be appended
     * @return Simple\Type\String
     */
    public function append($string)
    {
        $appended = $this->string . $string;

        return $this->valueOf($appended);
    }

    /**
     * Inserts a string at the beginning of another string
     *
     * @param string $string String to be prepended
     * @return Simple\Type\String
     */
    public function prepend($string)
    {
        $prepended = $string . $this->string;

        return $this->valueOf($prepended);
    }

    /**
     * Removes the last character from a string
     *
     * @return Simple\Type\String
     */
    public function chop()
    {
        $chopped = substr($this->string, 0, -1);

        return $this->valueOf($chopped);
    }

    /**
     * Shortens a string to a fixed limit
     *
     * @param int $limit Limit of characters
     * @param boolean $round Round to the last word and don't cut words
     * @return Simple\Type\String
     */
    public function shorten($limit, $round = false)
    {
        if (strlen($this->string) >= $limit) {
            $shortened = substr($this->string, 0, $limit);

            if ($round) {
                $word = strrpos($shortened, ' ');
                $shortened = substr($shortened, 0, $word);
            }
        }

        return $this->valueOf($shortened);
    }

    /**
     * Reverses a string
     *
     * @return Simple\Type\String
     */
    public function reverse()
    {
        $string = str_split($this->string);
        $string = array_reverse($string);
        $reversed = implode($string);

        return $this->valueOf($reversed);
    }

    /**
     * Scrambles all words in a string
     *
     * @return Simple\Type\String
     */
    public function scramble()
    {
        $string = explode(' ', $this->string);

        foreach ($string as &$word) {
            $word = str_shuffle($word);
        }

        $scrambled = implode(' ', $string);

        return $this->valueOf($scrambled);
    }

    /**
     * Shuffles all characters in a string
     *
     * @return Simple\Type\String
     */
    public function shuffle()
    {
        $shuffled = str_shuffle($this->string);

        return $this->valueOf($shuffled);
    }

    /**
     * Gives the intersection of two strings
     *
     * @param string $words String to be intersected
     * @return Simple\Type\String
     */
    public function intersect($words)
    {
        $string = explode(' ', $this->string);
        $words = explode(' ', $words);
        $intersection = array_intersect($string, $words);
        $intersected = implode(' ', $intersection);

        return $this->valueOf($intersected);
    }

    /**
     * Returns the number of words of a string
     *
     * @return int Word count
     */
    public function words()
    {
        return str_word_count($this->string);
    }
}
