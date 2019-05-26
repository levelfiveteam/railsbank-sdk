<?php

namespace LevelFiveTeam\Railsbank\Entiity;

use Zend\Validator;

class VersionNumber
{
    /**
     * @var string
     */
    private $version;

    public function __construct(array $response)
    {
        //
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    private function validate($dataset = [])
    {
        return [
            'version' => Validator\NotEmpty::STRING,
        ];
    }
}
