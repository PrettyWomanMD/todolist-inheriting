<?php
session_start();

$url = rtrim($_SERVER['REQUEST_URI'], "\t/");

function autoloading(string $class)
{
    require_once str_replace('\\', '/', $class).'.php';
}
spl_autoload_register('autoloading');