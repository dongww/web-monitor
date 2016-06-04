<?php
/**
 * User: dongww
 * Date: 2016/6/4
 * Time: 13:58
 */

namespace Dongww\WebMonitor\Helper;


class IconvHelper
{
    public static function convert($string)
    {
        if (strpos($_SERVER['OS'], 'Windows') === false) {
            return $string;
        }

        return iconv('gbk', 'utf-8', $string);
    }
}