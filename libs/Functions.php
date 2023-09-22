<?php

class Functions
{

    public function toReal($price)
    {
        return number_format(floatval($price), 2, ',', '.');
    }

    public function toFloat($price)
    {
        return number_format(floatval($price), 2, '.', '');
    }

    public function urlAmigavel($string)
    {
        $replace = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
        $pieces = explode(' ', $replace);
        $string = implode($pieces, '-');
        $string = strtolower($string);
        return $string;
    }

}