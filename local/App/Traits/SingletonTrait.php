<?php

namespace App\Traits;

trait SingletonTrait
{
    private static ?self $instance = null;

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
