<?php

namespace App\Repositories\Shared;

interface PropertyRepositoryInterface extends RepositoryInterface
{
    public function add(int $propertyId, string $value): ?int;

    public function update(int $propertyEnumId, string $value): bool;

    public function delete(int $propertyEnumId): bool;
}
