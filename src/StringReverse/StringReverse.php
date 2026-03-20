<?php

declare(strict_types=1);

namespace Katas\StringReverse;

final class StringReverse
{
    // --8<-- [start:viaBuiltIn]
    /**
     * @param string $str
     * @return string
     */
    public static function viaBuiltIn(string $str): string
    {
        return strrev($str);
    }
    // --8<-- [end:viaBuiltIn]

    // --8<-- [start:viaSplit]
    /**
     * @param string $str
     * @return string
     */
    public static function viaSplit(string $str): string
    {
        $arr = str_split($str);
        $reverse = array_reverse($arr);
        return \implode("", $reverse);
    }
    // --8<-- [end:viaSplit]
}
