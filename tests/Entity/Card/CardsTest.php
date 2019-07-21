<?php

namespace Test\Entity\Card;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Card\Card;
use Railsbank\Entity\Card\Cards;

class CardsTest extends TestCase
{
    public function testOneBenficiary()
    {
        $response = [
            [
                'ledger_id' => '1234',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB1',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
        ];

        $entity = new Cards($response);

        self::assertEquals(1, count($entity->getCards()));
    }

    public function testTwoBenficiary()
    {
        $response = [
            [
                'ledger_id' => '1234',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB1',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
            [
                'ledger_id' => '1231',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB2',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
        ];

        $entity = new Cards($response);

        self::assertEquals(2, count($entity->getCards()));

        foreach ($entity->getCards() as $card) {
            self::assertInstanceOf(Card::class, $card);
        }

        /** @var Card $card */
        // Get card related to Card ID GB1
        $card = $entity->getCardById('GB1');

        self::assertEquals($card->getCardId(), 'GB1');

        //Now remove from selection
        $entity->removeCard($card);

        // We should have 1 card remaining
        self::assertEquals(1, count($entity->getCards()));

        // Now we should not be able to see card by card ID GB1
        self::assertNull($entity->getCardById('GB1'));
    }


    public function testGetByLedgerId()
    {
        $response = [
            [
                'ledger_id' => '1234',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB1',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
            [
                'ledger_id' => '1231',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB2',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
            [
                'ledger_id' => '1231',
                'card_token' => 'GB1234111000',
                'card_id' => 'GB3',
                'created_at' => '2019-01-02',
                'card_type' => 'mastercard',
                'partner_product' => 'product-a',
                'card_design' => 'thebest',
                'card_status' => 'active',
                'card_programme' => 'UK',
            ],
        ];

        $entity = new Cards($response);

        self::assertEquals(3, count($entity->getCards()));

        // Only get the ones with ledger ID 1231
        $cards = $entity->getByLedgerId('1231');

        self::assertEquals(2, count($entity->getCards()));
    }
}
