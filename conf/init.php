<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/conf/functions.php';

spl_autoload_register(function ($class_name) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/class/' . $class_name . '.php';
});
