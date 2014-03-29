<?php

namespace Simple\Type;

use Simple\Type\Exception\IndexOutOfBoundsException;

class String
{
    use String\Escaping;
    use String\Normalization;
    use String\Conversion;
    use String\Filtering;
    use String\Manipulation;
    use String\Overload;

    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Returns the char value at the specified index.
     *
     * @param int $index The char index.
     * @return string The char value at the specified index of this string.
     * @throws Simple\Type\Exception\IndexOutOfBoundsException If the index argument is negative or not less than the length of this string.
     */
    public function charAt($index)
    {
        if ($index < 0 || $index > ($this->length() - 1)) {
            throw new IndexOutOfBoundsException();
        }

        return $this->string[$index];
    }

    /**
     * Returns the length of this string.
     *
     * @return int The length of the sequence of characters represented by this object.
     */
    public function length()
    {
        return mb_strlen($this->string);
    }

    /**
     * Returns if this string is empty
     *
     * @return boolean Returns true if, and only if, length() is 0.
     */
    public function isEmpty()
    {
        if ($this->length() === 0) {
            return true;
        }

        return false;
    }

    /**
     * Returns the string representation of the argument.
     *
     * @return Simple\Type\String A string representation of the argument.
     */
    public function valueOf($argument)
    {
        return new String($argument);
    }

    /**
     * Returns the string representation of this String object.
     *
     * @return string String representation of this object
     */
    public function toString()
    {
        return $this->__toString();
    }

    /**
     * Returns the string representation of this String object.
     *
     * @return string String representation of this object
     */
    public function __toString()
    {
        return $this->string;
    }
}
