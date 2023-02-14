<?php

namespace App\Repositories\Shared;

use App\Helpers\Iblock;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use CIBlockElement;
use Exception;

abstract class AbstractIblockRepository extends AbstractRepositoryInterface implements EntityRepositoryInterface
{
    /**
     * загружен ли модуль iblock?
     */
    public static bool $moduleLoaded = false;

    private int $iblockId;

    public function getIblockId(): int
    {
        return $this->iblockId;
    }

    /**
     * @throws LoaderException
     */
    public function preInit(): void
    {
        if (! static::$moduleLoaded) {
            Loader::includeModule('iblock');
        }
    }

    /**
     * @throws ArgumentException
     * @throws LoaderException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function init(): void
    {
        $this->iblockId = Iblock::getByCode($this->getIblockCode());
    }

    /**
     * Код инфоблока
     */
    abstract public function getIblockCode(): string;

    /**
     * Добавить элемент ИБ
     * @throws Exception
     */
    public function add(array $fields = [], array $props = []): ?int
    {
        if (! empty($fields)) {
            $fields['IBLOCK_ID'] = $this->getIblockId();
            $el = new CIBlockElement();
            $fieldsForAdding = $fields;
            if (! empty($props)) {
                $fieldsForAdding['PROPERTY_VALUES'] = $props;
            }
            if ($id = $el->Add($fieldsForAdding)) {
                return (int) $id;
            } else {
                throw new Exception($el->LAST_ERROR);
            }
        }

        return null;
    }

    /**
     * Обновить элемент ИБ по id
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws Exception
     */
    public function update(int $id, array $fields = [], array $props = []): bool
    {
        $fields['IBLOCK_ID'] = $this->getIblockId();
        if (! empty($fields)) {
            $el = new CIBlockElement();
            if (! $el->Update($id, $fields)) {
                throw new Exception($el->LAST_ERROR);
            }
        }
        if (! empty($props)) {
            CIBlockElement::SetPropertyValuesEx($id, false, $props);
        }

        return true;
    }

    /**
     * Удалить элемент ИБ по id
     */
    public function delete(int $id): bool
    {
        return CIBlockElement::Delete($id);
    }
}
