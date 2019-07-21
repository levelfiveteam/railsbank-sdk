<?php

namespace Test\Entity\Beneficiary;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Card\Card;

class CardTest extends TestCase
{
    public function testBeneficiary()
    {
        $response = [
            'ledger_id' => '1234',
            'card_token' => 'GB1234111000',
            'card_id' => 'GB1',
            'created_at' => '2019-01-02',
            'card_type' => 'mastercard',
            'partner_product' => 'product-a',
            'card_design' => 'thebest',
            'card_status' => 'active',
            'card_programme' => 'UK',
        ];

        $entity = new Card($response);

        self::assertEquals('1234', $entity->getLedgerId());
        self::assertEquals('GB1234111000', $entity->getCardToken());
        self::assertEquals('GB1', $entity->getCardId());
        self::assertEquals('2019-01-02', $entity->getCreatedAt());
        self::assertEquals('mastercard', $entity->getCardType());
        self::assertEquals('product-a', $entity->getPartnerProduct());
        self::assertEquals('thebest', $entity->getCardDesign());
        self::assertEquals('active', $entity->getCardStatus());
        self::assertEquals('UK',$entity->getCardProgramme());
    }
}
