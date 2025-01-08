<?php

namespace App\Helpers;

class NumberHelper
{
    public static function format($value)
    {
        return floatval(preg_replace('/[^0-9.]/', '', $value));
    }
}
