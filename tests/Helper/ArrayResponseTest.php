<?php
namespace Test\Helper;

use Railsbank\Helper\ArrayResponse;
use PHPUnit\Framework\TestCase;

class ArrayResponseTest extends TestCase
{
    protected $response = ['hello' => 'world'];

    /**
     * @var ArrayResponse
     */
    private $helper;

    public function setUp()
    {
        $this->helper = new ArrayResponse($this->response);
    }

    public function testArrayExists()
    {
        self::assertTrue($this->helper->offsetExists('hello'));
        self::assertFalse($this->helper->offsetExists('world'));
        self::assertEquals('world', $this->helper->offsetGet('hello'));
        self::assertNull($this->helper->offsetUnset('hello'));
        self::assertNull($this->helper->offsetGet('hello'));
    }

}
