<?php

namespace App\Response;

class JsonError extends Json
{
    /**
     * JsonError constructor.
     * @param null $data
     * @param int $code
     */
    public function __construct($data = null, int $code = 400)
    {
        //header('HTTP/1.1 400 Bad Request');
        if (is_string($data)) {
            str_replace('\\r\\n', "\r\n", $data);
        }
        parent::__construct($code, $data);
    }
}
