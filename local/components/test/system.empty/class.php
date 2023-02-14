<?php

namespace rktv\Components;

use CBitrixComponent;

if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * Компонент-пустышка. Просто подключает определенный шаблон
 * Это бывает полезным, когда нужно вывести голую верстку, как например на странице 404
 */
class SystemEmptyComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->includeComponentTemplate();
    }
}
