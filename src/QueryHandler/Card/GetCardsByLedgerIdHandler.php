<?php

namespace LevelFiveTeam\Railsbank\QueryHandler\Card;

use LevelFiveTeam\Railsbank\Entity\Card\Card;
use LevelFiveTeam\Railsbank\Entity\Card\Cards;
use LevelFiveTeam\Railsbank\Handler;
use LevelFiveTeam\Railsbank\Query\Card\GetCards;
use LevelFiveTeam\Railsbank\Query\Card\GetCardsByLedgerId;
use LevelFiveTeam\Railsbank\RailsbankClient;

/**
 * Class GetCardsByLedgerIdHandler
 * @package LevelFiveTeam\Railsbank\Card\GetCardsHandler
 */
class GetCardsByLedgerIdHandler extends Handler
{
    /**
     * @param GetCards $command
     * @return \LevelFiveTeam\Railsbank\Entity\EntityInterface|string|null
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
