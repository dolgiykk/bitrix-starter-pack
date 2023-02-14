<?php

namespace App\Repositories\Shared;

use App\Helpers\Params\GetListParams;
use App\Helpers\Params\PagenavigationParams;
use Bitrix\Main\ORM\Query\Result;

interface RepositoryInterface
{
    public function getEntityClass(): string;

    public function setEntityClass(string $entityClass): void;

    public function init(): void;

    public function getSelectFields(): array;

    public function setSelectFields(array $selectFields): void;

    public function getOrder(): array;

    public function setOrder(array $order): void;

    public function getFilter(): array;

    public function setFilter(array $filter): void;

    public function getRuntimes(): ?array;

    public function setRuntimes(array $runtimes): void;

    public function getList(GetListParams $getListParams, $limit = -1, int $offset = 0): Result;

    public function getListPaginated(GetListParams $getListParams, PagenavigationParams $pagenavigationParams): RepositoryResult;

    public function getById(int $id): Result;

    public function getAll(?array $order = null): Result;
}
