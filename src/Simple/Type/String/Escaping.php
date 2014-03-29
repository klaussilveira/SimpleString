<?php

namespace Simple\Type\String;

trait Escaping
{
    public function escapeHtml()
    {
        $html = htmlspecialchars($this->string);

        return $this->valueOf($html);
    }

    public function escapeUrl()
    {
        $url = urlencode($this->string);

        return $this->valueOf($url);
    }
}
