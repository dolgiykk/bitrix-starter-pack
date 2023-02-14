<?php

if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

define('CONFIG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/config.php');
define('LOCAL_CONFIG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/config.local.php');

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/config/functions.php';
