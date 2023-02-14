<?php

namespace App\Services\Shared;

use App\Repositories\Shared\RepositoryInterface;

interface IServiceWithRepository
{
    public function getRepository(): RepositoryInterface;

    public function repositoryClass(): string;
}
