<?php

namespace Railsbank\Entity;

abstract class Entity
{
    protected $rawResponse = [];

    /**
     * Entity constructor.
     *
     * @param mixed $response
     */
    public function __construct($response)
    {
        $this->rawResponse = $response;
    }

    public function getRawResponse()
    {
        return $this->rawResponse;
    }
}
