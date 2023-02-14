<?php

namespace App\Repositories\Shared;

use Bitrix\Iblock\Iblock;
use Bitrix\Iblock\Property;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\ORM\Query\Result;
use Bitrix\Main\SystemException;
use Exception;

class PropertyEnumRepository extends AbstractRepositoryInterface implements PropertyRepositoryInterface
{
    /**
     * загружен ли модуль iblock?
     */
    public static bool $moduleLoaded = false;

    public function __construct()
    {
        parent::__construct(PropertyEnumerationTable::class);
    }

    /**
     * Поля выборки по умолчанию
     * @return string[]
     */
    public function getDefaultSelects(): array
    {
        return [
            '*',
            'NAME' => 'VALUE',
            'PROPERTY_NAME' => 'PROPERTY_DATA.NAME',
            'PROPERTY_CODE' => 'PROPERTY_DATA.CODE',
            'IBLOCK_ID' => 'PROPERTY_DATA.IBLOCK_ID',
            'IBLOCK_NAME' => 'IBLOCK_DATA.NAME',
            'IBLOCK_CODE' => 'IBLOCK_DATA.CODE',
            'IBLOCK_TYPE_ID' => 'IBLOCK_DATA.IBLOCK_TYPE_ID',
            'IBLOCK_API_CODE' => 'IBLOCK_DATA.API_CODE',
        ];
    }

    /**
     * Рантаймы по умолчанию
     * @return array[]
     */
    public function getDefaultRuntimes(): array
    {
        return [
            'PROPERTY_DATA' => [
                'data_type' => Property::class,
                'reference' => [
                    '=this.PROPERTY_ID' => 'ref.ID',
                ],
            ],
            'IBLOCK_DATA' => [
                'data_type' => Iblock::class,
                'reference' => [
                    '=this.PROPERTY_DATA.IBLOCK_ID' => 'ref.ID',
                ],
            ],
        ];
    }

    public function loadDefaults()
    {
        $this->setSelectFields($this->getDefaultSelects());
        $this->setRuntimes($this->getDefaultRuntimes());
        $this->setFilter([]);
    }

    public function init(): void
    {
        $this->preInit();
        $this->loadDefaults();
    }

    /**
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getOneByIBlockApiCodePropertyCodeAndValue(string $apiCode, string $propertyCode, string $value): Result
    {
        return $this->getList(
            [
                '=IBLOCK_API_CODE' => $apiCode,
                '=PROPERTY_CODE' => $propertyCode,
                '=VALUE' => $value,
            ],
            [],
            $this->getDefaultSelects(),
            $this->getRuntimes(),
            1
        );
    }

    public function getData(string $apiCode, string $propertyCode): \CIBlockPropertyEnumResult
    {
        return \CIBlockPropertyEnum::GetList(
            [],
            [
                '=IBLOCK_API_CODE' => $apiCode,
                '=PROPERTY_CODE' => $propertyCode,
            ]
        );

//        return $this->getList(
//            [
//                "=IBLOCK_API_CODE" => $apiCode,
//                '=PROPERTY_CODE' => $propertyCode,
//            ],
//            [],
//            $this->getDefaultSelects(),
//            $this->getRuntimes(),
//            1
//        );
    }

    public function preInit(): void
    {
        if (! static::$moduleLoaded) {
            Loader::includeModule('iblock');
        }
    }

    /**
     * @throws Exception
     */
    public function add(int $propertyId, string $value): ?int
    {
        $newValueId = \CIBlockPropertyEnum::Add([
            'PROPERTY_ID' => $propertyId,
            'VALUE' => $value,
        ]);

        if ((int) $newValueId < 0) {
            throw new Exception('Unable to add a value');
        }

        return $newValueId;
    }

    /**
     * @throws Exception
     */
    public function update(int $propertyEnumId, string $value): bool
    {
        if (! \CIBlockPropertyEnum::Update($propertyEnumId, ['VALUE' => $value])) {
            throw new Exception('Unable to update an item');
        }

        return true;
    }

    public function delete(int $propertyEnumId): bool
    {
        if (! \CIBlockPropertyEnum::Delete($propertyEnumId)) {
            throw new Exception('Unable to delete an item');
        }

        return true;
    }
}
