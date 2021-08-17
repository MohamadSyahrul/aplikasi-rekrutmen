<?php

namespace App\Helpers;

class Helper
{
    public static function formatCode($code)
    {
        return str_replace('>', 'HTMLCloseTag', str_replace('<', 'HTMLOpenTag', $code));
    }
}
