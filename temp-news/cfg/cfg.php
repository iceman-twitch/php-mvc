<?php

class Config{
    public static $url="localhost/cfg/cfg.json";
    function __construct()
    {
    }
    public static function Load()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response,true);// ? array() : null;
    }
}