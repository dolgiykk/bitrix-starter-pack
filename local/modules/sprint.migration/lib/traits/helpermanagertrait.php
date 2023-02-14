<?php

namespace Sprint\Migration\Traits;

use Sprint\Migration\HelperManager;

trait helpermanagertrait
{
    public function getHelperManager()
    {
        return HelperManager::getInstance();
    }
}
