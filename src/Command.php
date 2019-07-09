<?php
namespace Railsbank;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;

abstract class Command
{
    /**
     * @var RailsbankConfig
     */
    public $railsbankConfig;

    /**
     * @var InputFilterInterface
     */
    protected $input;

    /**
     * Person constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $factory = new Factory();
        $inputFilter = $factory->createInputFilter($this->getInputFilterSpecification());

        $this->input = $inputFilter->setData($data);

        if (!$this->input->isValid()) {
            throw new \DomainException(json_encode($inputFilter->getMessages()), 422);
        }
    }

    /**
     * @param $railsbankConfig
     * @return $this
     */
    public function setRailsbankConfig($railsbankConfig)
    {
        $this->railsbankConfig = $railsbankConfig;
        return $this;
    }

    /**
     * @return RailsbankConfig
     */
    public function getRailsbankConfig() : RailsbankConfig
    {
        return $this->railsbankConfig;
    }

    public function getInput() : InputFilterInterface
    {
        return $this->input;
    }
}
