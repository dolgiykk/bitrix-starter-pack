<?php

namespace App\Helpers\Params;

use App\Traits\SingletonTrait;

class GetListParams
{
    use SingletonTrait;

    private ?array $filter = null;

    private ?array $order = null;

    private ?array $runtime = null;

    private ?array $select = null;

    public function getFilter(): ?array
    {
        return $this->filter;
    }

    public function getOrder(): ?array
    {
        return $this->order;
    }

    public function getRuntime(): ?array
    {
        return $this->runtime;
    }

    public function getSelect(): ?array
    {
        return $this->select;
    }

    public function setFilter(?array $filter): void
    {
        $this->filter = $filter;
    }

    public function setOrder(?array $order): void
    {
        $this->order = $order;
    }

    public function setRuntime(?array $runtime): void
    {
        $this->runtime = $runtime;
    }

    public function setSelect(?array $select): void
    {
        $this->select = $select;
    }
}
