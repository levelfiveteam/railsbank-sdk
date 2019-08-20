<?php
use Railsbank\Query;
use Railsbank\QueryHandler;
use Railsbank\Command;
use Railsbank\CommandHandler;

/**
 * Configuration for Railsbank API
 * All the URLs and Specified keys must be stored in environment variables
*/
return [
    'application_name' => 'Railsbank PHP SDK',
    'mode' => (getenv('RAILSBANK_MODE'))?: 'play',
    'railsbank_configuration' => [
        'play' => [
            'base_url' => getenv('RAILSBANK_PLAY_BASEURL'),
            'role' => getenv('RAILSBANK_PLAY_ROLE'),
            'api_key' => getenv('RAILSBANK_API_KEY'),
        ],
        'play_live' => [
            'base_url' => getenv('RAILSBANK_PLAYLIVE_BASEURL'),
            'role' => getenv('RAILSBANK_PLAYLIVE_ROLE'),
            'api_key' => getenv('RAILSBANK_PLAYLIVE_API_KEY'),
        ],
        'live_account' => [
            'base_url' => getenv('RAILSBANK_LIVE_BASEURL'),
            'role' => getenv('RAILSBANK_LIVE_ROLE'),
            'api_key' => getenv('RAILSBANK_LIVE_API_KEY'),
        ],
    ],
    'commands' => [
        Query\Version\GetVersion::class => QueryHandler\Version\GetVersionHandler::class,
        Query\Me\Information::class => QueryHandler\Me\InformationHandler::class,
        Query\Me\PHPVersion::class => QueryHandler\Me\PHPVersionHandler::class,
        Query\Customer\GetLedger::class => QueryHandler\Customer\GetLedgerHandler::class,
        Query\Customer\GetLedgers::class => QueryHandler\Customer\GetLedgersHandler::class,
        Query\Customer\GetEndusers::class => QueryHandler\Customer\GetEndusersHandler::class,
        Query\Customer\GetEnduser::class => QueryHandler\Customer\GetEnduserHandler::class,
        Query\Transaction\GetTransaction::class => QueryHandler\Transaction\GetTransactionHandler::class,
        Query\Transaction\GetTransactions::class => QueryHandler\Transaction\GetTransactionsHandler::class,
        Query\Card\GetCard::class => QueryHandler\Card\GetCardHandler::class,
        Query\Card\GetCards::class => QueryHandler\Card\GetCardsHandler::class,
        Query\Card\GetCardsByLedgerId::class => QueryHandler\Card\GetCardsByLedgerIdHandler::class,
        Query\Card\GetCardImageUrl::class => QueryHandler\Card\GetCardImageUrlHandler::class,
        Query\Card\GetPin::class => QueryHandler\Card\GetPinHandler::class,
        Query\Beneficiary\GetBeneficiaries::class => QueryHandler\Beneficiary\GetBeneficiariesHandler::class,

        Command\Customer\EndUsers\CreatePerson::class => CommandHandler\Customer\EndUsers\CreatePersonHandler::class,
        Command\Customer\Ledger\CreateLedger::class => CommandHandler\Customer\Ledger\CreateLedgerHandler::class,
        Command\Customer\Ledger\CloseLedger::class => CommandHandler\Customer\Ledger\CloseLedgerHandler::class,
        Command\Beneficiary\CreateBeneficiary::class => CommandHandler\Beneficiary\CreateBeneficiaryHandler::class,
        Command\Transaction\CreateTransaction::class => CommandHandler\Transaction\CreateTransactionHandler::class,
        Command\Card\CreateCard::class => CommandHandler\Card\CreateCardHandler::class,
        Command\Card\ActivateCard::class => CommandHandler\Card\ActivateCardHandler::class,
    ],
    'entity_map' => [
        Query\Version\GetVersion::class => "Railsbank\\Entity\\Version\\VersionNumber",
        Query\Me\Information::class => "Railsbank\\Entity\\Me\\Information",
        Query\Customer\GetLedger::class => "Railsbank\\Entity\\Customer\\GetLedger",
        Query\Customer\GetEnduser::class => "Railsbank\\Entity\\Customer\\EndUsers\\EndUser",
        Query\Transaction\GetTransaction::class => "Railsbank\\Entity\\Transaction\\DetailedTransaction",
        Query\Transaction\GetTransactions::class => "Railsbank\\Entity\\Transaction\\Transactions",
        Query\Card\GetCards::class => "Railsbank\\Entity\\Card\\Cards",
        Query\Card\GetCardsByLedgerId::class => "Railsbank\\Entity\\Card\\Cards",
        Query\Card\GetCard::class => "Railsbank\\Entity\\Card\\Card",
        Query\Card\GetCardImageUrl::class => "Railsbank\\Entity\\Card\\CardImage",
        Query\Card\GetPin::class => "Railsbank\\Entity\\Card\\Pin",
        Query\Beneficiary\GetBeneficiaries::class => "Railsbank\\Entity\\Beneficiary\\Beneficiaries",

        Command\Customer\EndUsers\CreatePerson::class => "Railsbank\\Entity\\Customer\\EndUsers\\EndUserId",
        Command\Customer\Ledger\CreateLedger::class => "Railsbank\\Entity\\Customer\\Ledger",
        Command\Customer\Ledger\CloseLedger::class => "Railsbank\\Entity\\Customer\\Ledger",
        Command\Beneficiary\CreateBeneficiary::class => "Railsbank\\Entity\\Beneficiary\\BeneficiaryId",
        Command\Transaction\CreateTransaction::class => "Railsbank\\Entity\\Transaction\\TransactionId",
        Command\Card\CreateCard::class => "Railsbank\\Entity\\Card\\CardId",
    ],
    'railsbank_http_url' => [
        Query\Version\GetVersion::class => '/v1/customer/version',
        Query\Me\Information::class => '/v1/customer/me',
        Query\Customer\GetLedger::class => '/v1/customer/ledgers/{{ledger_id}}/wait',
        Query\Customer\GetLedgers::class => '/v1/customer/ledgers',
        Query\Customer\GetEndusers::class => '/v1/customer/endusers',
        Query\Customer\GetEnduser::class => '/v1/customer/endusers/{{enduser_id}}',
        Query\Transaction\GetTransactions::class => '/v1/customer/ledgers/{{ledger_id}}/entries',
        Query\Transaction\GetTransaction::class => '/v1/customer/transactions/{{transaction_id}}',
        Query\Card\GetCards::class => '/v1/customer/cards',
        Query\Card\GetCardsByLedgerId::class => '/v1/customer/cards',
        Query\Card\GetCard::class => '/v1/customer/cards/{{card_id}}',
        Query\Card\GetCardImageUrl::class => '/v1/customer/cards/{{card_id}}/image',
        Query\Card\GetPin::class => '/v1/customer/cards/{{card_id}}/pin',
        Query\Beneficiary\GetBeneficiaries::class => '/v1/customer/beneficiaries?holder_id={{holder_id}}',

        Command\Customer\EndUsers\CreatePerson::class => '/v1/customer/endusers',
        Command\Customer\Ledger\CreateLedger::class => '/v1/customer/ledgers',
        Command\Customer\Ledger\CloseLedger::class => '/v1/customer/ledgers/{{ledger_id}}/close',
        Command\Beneficiary\CreateBeneficiary::class => '/v1/customer/beneficiaries',
        Command\Transaction\CreateTransaction::class => '/v1/customer/transactions',
        Command\Card\CreateCard::class => '/v1/customer/cards',
        Command\Card\ActivateCard::class => '/v1/customer/cards/{{card_id}}/activate',
    ],
];
