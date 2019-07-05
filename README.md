# Railsbank PHP SDK Kit

[![Build Status](https://travis-ci.com/levelfiveteam/railsbank-sdk.svg?token=42A9e8Yz9HCHugYVWyzW&branch=master)](https://travis-ci.com/levelfiveteam/railsbank-sdk)


### Licence
You are free to use this package for commercial and non-commercial.   

## Instructions

Railsbank PHP SDK Kit, that allows you to provide a full facility to create accounts, ledgers, and mastercard for your application.

We use commands and queries to decouple requests, and allowing the ability to use a queue handler (AWS SQS, RabbitMQ etc...) for bulk queries.

Important note; we are only supporting GBP.  Our aim is to release this in v1.2.

Simply set your application to store the service as a factory;

`
$railsbank = new Railsbank('demo.config.php', 'live_account');
`

Create commands and queries as and when you need to (example below returns back a response to give you the API Version);

`
$response = $railsbank->handle(new GetVersion());
`

The response will be an immutable object, with the option to see the array.


## Commands and Queries

Action | Command or Query | Response type
---|---|---
GET | Query\Version\GetVersion | QueryHandler\Version\GetVersionHandler
GET | Query\Me\Information | QueryHandler\Me\InformationHandler
GET | Query\Customer\GetLedger | QueryHandler\Customer\GetLedgerHandler
GET | Query\Customer\GetLedgers | QueryHandler\Customer\GetLedgersHandler
GET | Query\Customer\GetEndusers | QueryHandler\Customer\GetEndusersHandler
GET | Query\Customer\GetEnduser | QueryHandler\Customer\GetEnduserHandler
GET | Query\Transaction\GetTransaction | QueryHandler\Transaction\GetTransactionHandler
GET | Query\Transaction\GetTransactions | QueryHandler\Transaction\GetTransactionsHandler
GET | Query\Card\GetCard | QueryHandler\Card\GetCardHandler
GET | Query\Card\GetCards | QueryHandler\Card\GetCardsHandler
GET | Query\Card\GetCardsByLedgerId | QueryHandler\Card\GetCardsByLedgerIdHandler
GET | Query\Card\GetCardImageUrl | QueryHandler\Card\GetCardImageUrlHandler
GET | Query\Card\GetPin | QueryHandler\Card\GetPinHandler
GET | Query\Beneficiary\GetBeneficiaries | QueryHandler\Beneficiary\GetBeneficiariesHandler
POST | Command\Customer\EndUsers\CreatePerson | CommandHandler\Customer\EndUsers\CreatePersonHandler
POST | Command\Customer\Ledger\CreateLedger | CommandHandler\Customer\Ledger\CreateLedgerHandler
POST | Command\Beneficiary\CreateBeneficiary | CommandHandler\Beneficiary\CreateBeneficiaryHandler
POST | Command\Transaction\CreateTransaction | CommandHandler\Transaction\CreateTransactionHandler
POST | Command\Card\CreateCard | CommandHandler\Card\CreateCardHandler
POST | Command\Card\ActivateCard | CommandHandler\Card\ActivateCardHandler


