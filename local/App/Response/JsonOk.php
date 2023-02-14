<?php

namespace App\Response;

class JsonOk extends Json
{
    /**
     * JsonOk constructor.
     * @param $data
     */
    public function __construct($data = null)
    {
        parent::__construct(200, $data);
    }
}
