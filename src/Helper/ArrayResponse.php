<?php
namespace Railsbank\Helper;

class ArrayResponse
{
    /**
     * @var array
     */
    private $apiResponse;

    /**
     * ArrayResponse constructor.
     * @param array $apiResponse
     */
    public function __construct($apiResponse)
    {
        $this->apiResponse = (array) $apiResponse;
    }

    public function offsetSet($offset, $value): void
    {
        if (null === $offset) {
            $this->apiResponse[] = $value;
        } else {
            $this->apiResponse[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->apiResponse[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->apiResponse[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->apiResponse[$offset] ?? null;
    }
}
