<?php
    define('AUTHNET_LOGIN', '');
    define('AUTHNET_TRANSKEY', '');

    if (!function_exists('curl_init')) {
        throw new Exception('CURL PHP extension not installed');
    }

    if (!function_exists('simplexml_load_file')) {
        throw new Exception('SimpleXML PHP extension not installed');
    }
