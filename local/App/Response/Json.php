<?php

namespace App\Response;

class Json
{
    /**
     * Json constructor. Useful for refresh some part of page by AJAX request
     * @param $data
     */
    public function __construct($data)
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        header('Content-type: application/json');
        echo json_encode($data);
        die();
    }
}
