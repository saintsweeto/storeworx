<?php

if (! function_exists('string_to_array')) {
    /**
     * Converts string array to real array
     *
     * @param string $string
     * @param string $delimiter
     * @return array
     *
     */
    function string_to_array(string $string, string $delimiter = ',')
    {
        return array_map(function ($string) {
            $string = str_replace('"', '', $string);
            $string = str_replace('[', '', $string);
            $string = str_replace(']', '', $string);
            return $string;
        }, explode($delimiter, $string));
    }
}
