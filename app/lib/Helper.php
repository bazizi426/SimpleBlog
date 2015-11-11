<?php

namespace App\Lib;


class Helper
{
    public static function filter($input)
    {
        $input = filter_var(
            filter_var($input,FILTER_SANITIZE_MAGIC_QUOTES),
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );

        return $input;
    }

    public static function dumpAndDie()
    {
        var_dump(func_get_args());
        die;
    }

    public static function debug($var)
    {
        $debug = debug_backtrace();
        echo "<div class='debug-container'><p>&nbsp;</p>",
             "<a class='debug' href='#'>",
                "<strong>{$debug[0]['file']}</strong>",
                " line.{$debug[0]['line']}",
                " <i class='fa fa-caret-down'></i>",
             "</a>";
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        echo "<p>&nbsp;</p></div>";
    }
}