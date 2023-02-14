<?php

namespace App\Helpers;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

class Iblock
{
    private static ?array $iblocks = null;

    /**
     * @throws ArgumentException
     * @throws LoaderException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getByCode(string $code): ?int
    {
        if (! Loader::includeModule('iblock')) {
            return null;
        }

        if (! is_null(self::$iblocks[$code])) {
            return self::$iblocks[$code];
        }

        $iblockTable = IblockTable::getList([
            'select' => ['CODE', 'ID'],
            'cache' => ['ttl' => 3600, 'cache_joins' => true],
        ])->fetchAll();

        foreach ($iblockTable as $iblock) {
            self::$iblocks[$iblock['CODE']] = (int) $iblock['ID'];
        }

        return self::$iblocks[$code] ?? null;
    }
}
