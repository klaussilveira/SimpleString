<?php

namespace Simple\Type\String;

trait Filtering
{
    /**
     * Censors certain words or characters in a string and replaces them with a *
     *
     * @param string|array $words Words or characters to be censored
     * @return Simple\Type\String Censored string
     */
    public function censor($words)
    {
        $censored = $this->string;

        if (is_array($words)) {
            foreach ($words as $word) {
                $censor = array();

                foreach (str_split($word) as $letter) {
                    $censor[] = '*';
                }

                $censored = str_replace($word, implode($censor), $censored);
            }
        } else {
            foreach (str_split($words) as $letter) {
                $censor[] = '*';
            }

            $censored = str_replace($words, implode($censor), $censored);
        }

        return $this->valueOf($censored);
    }
}
