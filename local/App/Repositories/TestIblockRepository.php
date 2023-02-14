<?php

namespace App\Repositories;

use App\Repositories\Shared\AbstractIblockRepository;
use Bitrix\Iblock\Elements\ElementTestTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

/**
 * Для корректной работы со свойствами элемента ИБ необходимо в настройках ИБ узакать Символьный код API
 * И подклюить класс Bitrix\Iblock\Elements\Element+Символьный код Api+Table (В нашем случае это ElementTestTable)
 */
class TestIblockRepository extends AbstractIblockRepository
{
    public function __construct()
    {
        parent::__construct(ElementTestTable::class);
    }

    /**
     * @return string
     */
    public function getIblockCode(): string
    {
        return config('iblock.Test');
    }

    /**
     * @return void
     * @throws ArgumentException
     * @throws LoaderException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function init(): void
    {
        $this->setSelectFields([
            'ID',
            'NAME',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
            'DATE_CREATE',
            'PROPERTY_TEST_STRING' => 'TEST_STRING.VALUE',
            'PROPERTY_TEST_NUMBER' => 'TEST_NUMBER.VALUE',
            'PROPERTY_TEST_LIST' => 'TEST_LIST.VALUE',
            'PROPERTY_TEST_IB_ELEMENT_BIND' => 'TEST_IB_ELEMENT_BIND.VALUE',
            'PROPERTY_TEST_HB_ELEMENT_BIND' => 'TEST_HB_ELEMENT_BIND.VALUE',
            'PROPERTY_TEST_USER_BIND' => 'TEST_USER_BIND.VALUE',
            'PROPERTY_TEST_IB_SECTION_BIND' => 'TEST_IB_SECTION_BIND.VALUE',
        ]);
        parent::init();
    }
}
