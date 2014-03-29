<?php

namespace Simple\Type\String;

trait Conversion
{
    /**
     * Converts the string to lowercase (e.g: lorem ipsum dolor)
     *
     * @return Simple\Type\String Lower-cased string
     */
    public function toLowerCase()
    {
        $lower = strtolower($this->string);

        return $this->valueOf($lower);
    }

    /**
     * Converts the string to uppercase (e.g: LOREM IPSUM DOLOR)
     *
     * @return Simple\Type\String Upper-cased string
     */
    public function toUpperCase()
    {
        $upper = strtoupper($this->string);

        return $this->valueOf($upper);
    }

    /**
     * Converts the string to sentence case (e.g: Lorem ipsum dolor)
     *
     * @return Simple\Type\String Sentence-cased string
     */
    public function toSentenceCase()
    {
        $sentence = $this->toLowerCase();
        $sentence = ucfirst($sentence);

        return $this->valueOf($sentence);
    }

    /**
     * Converts the string to title case (e.g: Lorem Ipsum Dolor)
     *
     * @return Simple\Type\String Title-cased string
     */
    public function toTitleCase()
    {
        $title = $this->toLowerCase();
        $title = ucwords($title);

        return $this->valueOf($title);
    }

    /**
     * Converts the spaces in string to underscores and lowercases the string (e.g: lorem_ipsum_dolor)
     *
     * @return Simple\Type\String Underscored string
     */
    public function toUnderscores()
    {
        $underscore = $this->toLowerCase();
        $underscore = str_replace(' ', '_', $underscore);

        return $this->valueOf($underscore);
    }

    /**
     * Converts the string to camel case (e.g: loremIpsumDolor)
     *
     * @return Simple\Type\String Camel-cased string
     */
    public function toCamelCase()
    {
        $camel = ucwords($this->string);
        $camel = str_replace(' ', '', $camel);
        $camel[0] = strtolower($camel[0]);

        return $this->valueOf($camel);
    }

    /**
     * Cleans and optimizes the string to be search engine friendly (SEO)
     *
     * @param string $separator Character that separates words
     * @return Simple\Type\String Clean string
     */
    public function toCleanUrl($separator = '-')
    {
        $accents = array('Š' => 'S',
                         'š' => 's',
                         'Ð' => 'Dj',
                         'Ž' => 'Z',
                         'ž' => 'z',
                         'À' => 'A',
                         'Á' => 'A',
                         'Â' => 'A',
                         'Ã' => 'A',
                         'Ä' => 'A',
                         'Å' => 'A',
                         'Æ' => 'A',
                         'Ç' => 'C',
                         'È' => 'E',
                         'É' => 'E',
                         'Ê' => 'E',
                         'Ë' => 'E',
                         'Ì' => 'I',
                         'Í' => 'I',
                         'Î' => 'I',
                         'Ï' => 'I',
                         'Ñ' => 'N',
                         'Ò' => 'O',
                         'Ó' => 'O',
                         'Ô' => 'O',
                         'Õ' => 'O',
                         'Ö' => 'O',
                         'Ø' => 'O',
                         'Ù' => 'U',
                         'Ú' => 'U',
                         'Û' => 'U',
                         'Ü' => 'U',
                         'Ý' => 'Y',
                         'Þ' => 'B',
                         'ß' => 'Ss',
                         'à' => 'a',
                         'á' => 'a',
                         'â' => 'a',
                         'ã' => 'a',
                         'ä' => 'a',
                         'å' => 'a',
                         'æ' => 'a',
                         'ç' => 'c',
                         'è' => 'e',
                         'é' => 'e',
                         'ê' => 'e',
                         'ë' => 'e',
                         'ì' => 'i',
                         'í' => 'i',
                         'î' => 'i',
                         'ï' => 'i',
                         'ð' => 'o',
                         'ñ' => 'n',
                         'ò' => 'o',
                         'ó' => 'o',
                         'ô' => 'o',
                         'õ' => 'o',
                         'ö' => 'o',
                         'ø' => 'o',
                         'ù' => 'u',
                         'ú' => 'u',
                         'û' => 'u',
                         'ý' => 'y',
                         'ý' => 'y',
                         'þ' => 'b',
                         'ÿ' => 'y',
                         'ƒ' => 'f');
        $clean = strtr($this->string, $accents);
        $clean = strtolower($clean);
        $clean = preg_replace('/[^a-zA-Z0-9\s]/', '', $clean);
        $clean = preg_replace('{ +}', ' ', $clean);
        $clean = trim($clean);
        $clean = str_replace(' ', $separator, $clean);

        return $this->valueOf($clean);
    }
}
