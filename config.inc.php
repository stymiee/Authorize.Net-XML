<?php
    define('AUTHNET_LOGIN', 'cnpdev4289');
    define('AUTHNET_TRANSKEY', 'SR2P8g4jdEn7vFLQ');

    if (!function_exists('curl_init'))
    {
        throw new Exception('CURL PHP extension not installed');
    }

    if (!function_exists('simplexml_load_file'))
    {
        throw new Exception('SimpleXML PHP extension not installed');
    }

?>