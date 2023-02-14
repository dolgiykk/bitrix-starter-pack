<?php

namespace App\Services;

use App\Repositories\TestIblockRepository;
use App\Services\Shared\AbstractServiceWithRepository;
use App\Traits\SingletonTrait;
use Exception;

/**
 * @method TestIblockRepository getRepository()
 */
class TestIblockService extends AbstractServiceWithRepository
{
    use SingletonTrait;

    public function repositoryClass(): string
    {
        return TestIblockRepository::class;
    }

    /**
     * @throws Exception
     */
    public function add(array $params): ?int
    {
        global $USER;

        $userId = (int) $USER->GetID();
        if (empty($USER->GetID())) {
            throw new Exception('Вы не авторизованы');
        }

        $fields = [];
        $properties = ['USER' => $userId];

        foreach ($params as $key => $value) {
            switch (mb_strpos('PROPERTY', $key)) {
                case true:
                    $properties[] = $value;
                    break;
                default:
                    $fields[] = $value;
            }
        }

        return $this->getRepository()->add($fields, $properties);
    }
}
