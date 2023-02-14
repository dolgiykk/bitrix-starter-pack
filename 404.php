<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'] . '/local/templates/example/header.php';

$APPLICATION->SetTitle('Страница не найдена');
global $error404;

$APPLICATION->IncludeComponent(
    'test:system.empty',
    '404',
    ['ERROR_404' => $error404]
);

require $_SERVER['DOCUMENT_ROOT'] . '/local/templates/example/footer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';
