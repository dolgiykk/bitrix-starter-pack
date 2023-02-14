<?php

namespace App\Repositories\Shared;

interface EntityRepositoryInterface extends RepositoryInterface
{
    public function add(array $fields = [], array $props = []): ?int;

    public function update(int $id, array $fields = [], array $props = []): bool;

    public function delete(int $id): bool;
}
