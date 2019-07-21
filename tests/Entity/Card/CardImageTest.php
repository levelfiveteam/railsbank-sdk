<?php

namespace Test\Entity\Beneficiary;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Card\CardImage;

class CardImageTest extends TestCase
{
    public function testBeneficiary()
    {
        $response = [
            'temp_card_image_url' => 'https://www.demo-url-exists.com/image/logo.jpg',
        ];

        $entity = new CardImage($response);

        self::assertEquals('https://www.demo-url-exists.com/image/logo.jpg', $entity->getTempImageUrl());
        self::assertEquals('<img src="https://www.demo-url-exists.com/image/logo.jpg"/>', $entity->getHtmlOutput());
    }
}
