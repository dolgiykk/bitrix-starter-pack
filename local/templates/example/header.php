<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
?>
<html>
<head>
<? $APPLICATION->ShowHead(); ?>
<title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor="#FFFFFF">
<?if ($USER->IsAdmin()): ?>
    <? $APPLICATION->ShowPanel() ?>
<? endif ?>