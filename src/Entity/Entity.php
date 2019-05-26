<?php

namespace LevelFiveTeam\Railsbank\Entity;

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

    public function getRawResponse() : array
    {
        return $this->rawResponse;
    }
}
