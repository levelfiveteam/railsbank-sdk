<?php

namespace Test\Entity\Beneficiary;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Card\CardId;

class CardIdTest extends TestCase
{
    public function testBeneficiary()
    {
        $response = [
            'card_id' => 'GB1',
        ];

        $entity = new CardId($response);

        self::assertEquals('GB1', $entity->getCardId());
    }
}
