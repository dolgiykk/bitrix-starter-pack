<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require $_SERVER['DOCUMENT_ROOT'] . '/local/templates/example/header.php';

$APPLICATION->SetTitle("Test");

$APPLICATION->IncludeComponent(
    'test:test',
    '',
    [
        'IBLOCK_API_CODE' => config('iblock.Test'),
        'PAGE_WINDOW' => 10,
        'PROPERTY_CODE' => 'TEST_LIST',
        'PAGE_SIZE' => 10
    ]
);

require $_SERVER['DOCUMENT_ROOT'] . '/local/templates/example/footer.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_after.php';


