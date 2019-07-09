<?php

namespace Railsbank\QueryHandler\Card;

use Railsbank\Entity\Card\Card;
use Railsbank\Entity\Card\Cards;
use Railsbank\Handler;
use Railsbank\Query\Card\GetCards;
use Railsbank\Query\Card\GetCardsByLedgerId;
use Railsbank\RailsbankClient;

/**
 * Class GetCardsByLedgerIdHandler
 * @package Railsbank\Card\GetCardsHandler
 */
class GetCardsByLedgerIdHandler extends Handler
{
    /**
     * @param GetCards $command
     * @return \Railsbank\Entity\EntityInterface|string|null
     * @throws \Exception
     */
    public function handleGetCardsByLedgerId(GetCardsByLedgerId $command)
    {
        $client = new RailsbankClient($command->getRailsbankConfig());

        try {
            /** @var Cards $cards */
            $cards = $client->handleApiCall($command, 'GET');
            return $cards->getByLedgerId($command->getInput()->getValue('ledger_id'));
        } catch (\Exception $e) {
            throw $e;
        }

    }
}
