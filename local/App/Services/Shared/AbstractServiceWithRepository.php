<?php

namespace App\Services\Shared;

use App\Helpers\Params\GetListParams;
use App\Repositories\Shared\RepositoryInterface;

abstract class AbstractServiceWithRepository implements IServiceWithRepository
{
    private ?RepositoryInterface $repository = null;

    /**
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface
    {
        if (is_null($this->repository)) {
            $className = $this->repositoryClass();
            $this->repository = new $className();
        }

        return $this->repository;
    }

    abstract public function repositoryClass(): string;

    /**
     * Получить массив данных сущности по Id
     */
    public function getById(int $id): array
    {
        $result = $this->getRepository()->getById($id)->fetch();
        if (empty($result)) {
            $result = [];
        }

        return $result;
    }

    /**
     * Получить массив данных всех сущностей
     */
    public function getAll(): array
    {
        return $this->getRepository()->getAll()->fetchAll() ?? [];
    }

    /**
     * Получить массив данных отфильтрованных и отсортированных сущностей
     */
    public function getList(GetListParams $getListParams, $limit = -1, int $offset = 0): array
    {
        return $this->getRepository()->getList($getListParams, $limit, $offset)->fetchAll() ?? [];
    }
}
