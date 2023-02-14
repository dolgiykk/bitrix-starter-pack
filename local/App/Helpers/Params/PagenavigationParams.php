<?php

namespace App\Helpers\Params;

use App\Traits\SingletonTrait;
use Protobuf\Exception;

class PagenavigationParams
{
    use SingletonTrait;

    private int $pageSize = 20;

    private string $navParam = 'page';

    public function getNavParam(): string
    {
        return $this->navParam;
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setNavParam(string $navParam): void
    {
        $this->navParam = $navParam;
    }

    /**
     * @throws Exception
     */
    public function setPageSize(?int $pageSize): void
    {
        if ($pageSize <= 0) {
            throw new Exception('Page size must be greater than 0');
        }
        $this->pageSize = $pageSize;
    }

    public function setRuntime(?array $runtime): void
    {
        $this->runtime = $runtime;
    }
}
