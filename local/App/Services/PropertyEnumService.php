<?php

namespace App\Services;

use App\Helpers\Params\GetListParams;
use App\Helpers\Params\PagenavigationParams;
use App\Repositories\Shared\PropertyEnumRepository;
use App\Repositories\Shared\RepositoryResult;
use App\Services\Shared\AbstractServiceWithRepository;
use App\Traits\SingletonTrait;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

/**
 * @method PropertyEnumRepository getRepository();
 */
class PropertyEnumService extends AbstractServiceWithRepository
{
    use SingletonTrait;

    public function repositoryClass(): string
    {
        return PropertyEnumRepository::class;
    }

    /**
     * Получить enum по коду API ИБ, коду свойства и значению
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getOneByIBlockApiCodePropertyCodeAndValue(string $apiCode, string $propertyCode, string $value): array
    {
        $result = $this->getRepository()->getOneByIBlockApiCodePropertyCodeAndValue($apiCode, $propertyCode, $value)->fetch();
        if (empty($result)) {
            $result = [];
        }

        return $result;
    }

    public function getData(string $iblockApiCode, string $propertyCode): array
    {
        $result = $this->getRepository()->getData($iblockApiCode, $propertyCode)->fetch();
        if (empty($result)) {
            $result = [];
        }

        return $result;
    }

    /**
     * @throws \Exception
     */
    public function add(string $iblockApiCode, string $propertyCode, string $value): ?int
    {
        $enumInfo = $this->getRepository()->getData($iblockApiCode, $propertyCode)->fetch();

        return $this->getRepository()->add($enumInfo['PROPERTY_ID'], $value);
    }

    public function getListPaginated(GetListParams $getListParams, PagenavigationParams $pagenavigationParams): RepositoryResult
    {
        return $this->getRepository()->getListPaginated($getListParams, $pagenavigationParams);
    }

    /**
     * @throws \Exception
     */
    public function update(string $propertyEnumId, string $value): ?int
    {
        return $this->getRepository()->update($propertyEnumId, $value);
    }

    /**
     * @throws \Exception
     */
    public function delete(string $propertyEnumId): ?int
    {
        return $this->getRepository()->delete($propertyEnumId);
    }
}
