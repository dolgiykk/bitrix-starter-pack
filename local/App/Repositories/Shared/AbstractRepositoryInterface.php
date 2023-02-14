<?php

namespace App\Repositories\Shared;

use App\Helpers\Params\GetListParams;
use App\Helpers\Params\PagenavigationParams;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Entity;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\ORM\Query\Result;
use Bitrix\Main\SystemException;
use Bitrix\Main\UI\PageNavigation;

abstract class AbstractRepositoryInterface implements RepositoryInterface
{
    const cacheDefaultTTL = 0;

    private string $entityClass;

    private array $selectFields = ['*'];

    private array $order = [];

    private array $filter = [];

    private ?array $runtimes = null;

    protected ?PageNavigation $obNav = null;

    public function __construct(string $entityClass)
    {
        $this->preInit();
        $this->setEntityClass($entityClass);
        $this->init();
    }

    abstract public function preInit(): void;

    abstract public function init(): void;

    /**
     * Время жизни кеша
     */
    public function getCacheTTL(): int
    {
        return self::cacheDefaultTTL;
    }

    public function getNav(): ?PageNavigation
    {
        return $this->obNav;
    }

    public function getEntityClass(): string
    {
        return $this->entityClass;
    }

    public function setEntityClass(string $entityClass): void
    {
        $this->entityClass = $entityClass;
    }

    public function getSelectFields(): array
    {
        return $this->selectFields;
    }

    public function setSelectFields(array $selectFields): void
    {
        $this->selectFields = $selectFields;
    }

    public function getOrder(): array
    {
        return $this->order;
    }

    public function setOrder(array $order): void
    {
        $this->order = $order;
    }

    public function getFilter(): array
    {
        return $this->filter;
    }

    public function setFilter(array $filter): void
    {
        $this->filter = $filter;
    }

    public function getRuntimes(): ?array
    {
        return $this->runtimes;
    }

    public function setRuntimes(array $runtimes): void
    {
        $this->runtimes = $runtimes;
    }

    public function getDefaultSelects(): array
    {
        return ['*'];
    }

    public function getDefaultOrder(): array
    {
        return [];
    }

    public function getDefaultRuntimes(): array
    {
        return [];
    }

    /**
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getList(GetListParams $getListParams, $limit = -1, int $offset = 0): Result
    {
        $limit = $limit == 'all' ? -1 : (int) $limit;
        $use_nav = ! is_null($this->getNav()) && $limit > -1;
        if ($use_nav) {
            $this->obNav->allowAllRecords(true)
                ->setPageSize($limit)
                ->initFromUri();
            $offset = $this->obNav->getOffset();
            $limit = $this->obNav->getLimit();
        }
        /**
         * @var $entity Entity\DataManager
         */
        $entity = $this->getEntityClass();
        $dbResult = $entity::getList([
            'select' => $getListParams->getSelect() ?? $this->getSelectFields() ?? [],
            'order' => $getListParams->getOrder() ?? $this->getOrder() ?? [],
            'filter' => $getListParams->getFilter() ?? $this->getFilter() ?? [],
            'runtime' => $getListParams->getRuntime() ?? $this->getRuntimes() ?? [],
            'count_total' => $use_nav,
            'offset' => $offset,
            'limit' => $limit,
            'cache' => [
                'ttl' => $this->getCacheTTL(),
            ],
        ]
        );
        if ($use_nav) {
            $this->obNav->setRecordCount($dbResult->getCount());
        }

        return $dbResult;
    }

    /**
     * @return RepositoryResult
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getListPaginated(GetListParams $getListParams, PagenavigationParams $pagenavigationParams): RepositoryResult
    {
        if (empty($this->getNav())) {
            $this->obNav = new PageNavigation($pagenavigationParams->getNavParam());
        }
        $this->obNav->allowAllRecords(true)
            ->setPageSize($pagenavigationParams->getPageSize())
            ->initFromUri();
        $offset = $this->obNav->getOffset();
        $limit = $this->obNav->getLimit();
        $result = $this->getList($getListParams, $limit, $offset);

        return new RepositoryResult(
            $result->fetchAll() ?? [],
            $this->getNav()
        );
    }

    /**
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getById(int $id): Result
    {
        return $this->getList(['=ID' => $id]);
    }

    /**
     * Получить все элементы, можно указать сортировку
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function getAll(?array $order = null): Result
    {
        return $this->getList(null, $order);
    }
}
