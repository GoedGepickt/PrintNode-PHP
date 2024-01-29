<?php

namespace PrintNode;

use RuntimeException;

class HttpException extends RuntimeException {
    private $response;

    public function __construct($response)
    {
        $this->response = $response;

        parent::__construct(
            sprintf(
                'HTTP Error (%d): %s',
                $response->getStatusCode(),
                $response->getStatusMessage()
            )
        );
    }

    public function getHttpResponse(): object {
        return $this->response;
    }
}