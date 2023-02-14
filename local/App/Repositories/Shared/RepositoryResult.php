<?php

namespace App\Repositories\Shared;

use Bitrix\Main\UI\PageNavigation;

class RepositoryResult
{
    private array $items;

    private ?PageNavigation $nav = null;

    public function __construct(array $items = [], ?PageNavigation $nav = null)
    {
        $this->setItems($items);
        $this->setNav($nav);
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * Получить коллекцию данных в виде массива
     */
    public function getItems(): iterable
    {
        return $this->items;
    }

    /**
     * Получить первый/единственный элемент коллекции в виде массива
     */
    public function getFirst(): array
    {
        return ! empty($this->items) ? reset($this->items) : [];
    }

    /**
     * Установить объект навигации по коллекции
     */
    public function setNav(?PageNavigation $nav): void
    {
        $this->nav = $nav;
    }

    /**
     * Получить объект навигации по коллекции
     */
    public function getNav(): ?PageNavigation
    {
        return $this->nav;
    }
}
