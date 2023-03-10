<?php

use Sprint\Migration\Locale;

class index extends CModule
{
    public $MODULE_ID = 'sprint.migration';

    public $MODULE_NAME;

    public $MODULE_VERSION;

    public $MODULE_VERSION_DATE;

    public $MODULE_DESCRIPTION;

    public $PARTNER_NAME;

    public $PARTNER_URI;

    public $MODULE_GROUP_RIGHTS = 'Y';

    public function __construct()
    {
        $arModuleVersion = [];

        include __DIR__ . '/version.php';

        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        include __DIR__ . '/../locale/ru.php';
        include __DIR__ . '/../locale/en.php';

        $this->MODULE_NAME = GetMessage('SPRINT_MIGRATION_RU_MODULE_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('SPRINT_MIGRATION_RU_MODULE_DESCRIPTION');
        $this->PARTNER_NAME = GetMessage('SPRINT_MIGRATION_RU_PARTNER_NAME');
        $this->PARTNER_URI = GetMessage('SPRINT_MIGRATION_RU_PARTNER_URI');
    }

    public function DoInstall()
    {
        RegisterModule($this->MODULE_ID);

        CopyDirFiles(__DIR__ . '/admin', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin');
        $this->installGadgets();
    }

    public function DoUninstall()
    {
        DeleteDirFiles(__DIR__ . '/admin', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin');
        $this->unnstallGadgets();

        UnRegisterModule($this->MODULE_ID);
    }

    public function installGadgets()
    {
        CopyDirFiles(__DIR__ . '/gadgets', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/gadgets', true, true);
    }

    public function unnstallGadgets()
    {
        DeleteDirFiles(__DIR__ . '/gadgets', $_SERVER['DOCUMENT_ROOT'] . '/bitrix/gadgets');
    }

    public function GetModuleRightList()
    {
        $arr = [
            'reference_id' => ['D', 'W'],
            'reference'    => [
                '[D] ' . Locale::getMessage('RIGHT_D'),
                '[W] ' . Locale::getMessage('RIGHT_W'),
            ],
        ];

        return $arr;
    }
}
