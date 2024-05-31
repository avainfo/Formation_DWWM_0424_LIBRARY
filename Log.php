<?php

function logln($str): void
{
    date_default_timezone_set("Europe/Paris");
    echo "\e[34m" . date('H:i:s', time()) . " \e[32m[LOG] \e[39m" . $str . "\n";
}

function warnln($str): void
{
    date_default_timezone_set("Europe/Paris");
    echo "\e[34m" . date('H:i:s', time()) . " \e[33m[WARNING] \e[39m" . $str . "\n";
}

function errorln($str): void
{
    date_default_timezone_set("Europe/Paris");
    echo "\e[34m" . date('H:i:s', time()) . " \e[91m[ERROR] \e[39m" . $str . "\n";
}