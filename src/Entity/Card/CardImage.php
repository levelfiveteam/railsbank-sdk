<?php
namespace LevelFiveTeam\Railsbank\Entity\Card;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class CardImage
 * @package LevelFiveTeam\Railsbank\Entity\Card
 */
class CardImage extends Entity implements EntityInterface
{
    /**
     * @var string|null
     */
    private $tempImageUrl;

    /**
     * Person constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->tempImageUrl = $response->offsetGet('temp_card_image_url');

        parent::__construct($response);
    }

    /**
     * @return string|null
     */
    public function getTempImageUrl(): ?string
    {
        return $this->tempImageUrl;
    }

    public function getHtmlOutput() :? string
    {
        return '<img src="' . $this->tempImageUrl . '"/>';
    }
}
