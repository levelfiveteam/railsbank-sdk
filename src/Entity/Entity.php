<?php

namespace LevelFiveTeam\Railsbank\Entity;

abstract class Entity
{
    protected $rawResponse = [];

    public function __construct(array $response = [])
    {
        $this->rawResponse = $response;
    }

    public function getRawResponse() : array
    {
        return $this->rawResponse;
    }
}
