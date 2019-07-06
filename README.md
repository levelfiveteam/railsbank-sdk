# Railsbank PHP SDK Kit

[![Build Status](https://travis-ci.com/levelfiveteam/railsbank-sdk.svg?token=42A9e8Yz9HCHugYVWyzW&branch=master)](https://travis-ci.com/levelfiveteam/railsbank-sdk)


This repository is actively used in projects, and we will be maintaining it regularly.


### Licence
You are free to reuse and adapt this content with credit, for non-commercial purposes.  Please review License for further information.

## Instructions

This is the Railsbank PHP SDK Kit that allows you to provide a full facility to create customer accounts, ledgers, and a mastercard for your business/service.

We use commands and queries to de-couple requests, and to allow the ability to use a messaging queue system (AWS SQS, RabbitMQ etc...).

1. Simply set your application to store the service as a factory;

```
$railsbank = new Railsbank('demo.config.php', 'live_account');
```

2. Create commands and queries as and when you need to (example below returns back a response to give you the API Version);

*Example query:*
`
$response = $railsbank->handle(new GetVersion());
`

*Example Command:*
```
$command = new CreatePerson(
    [
        'name' => 'Mr Sponge Bob',
        'date_of_birth' => '1983-02-02',
        'telephone' => '07000000001',
        'nationality' => 'British',
        'country_of_residence' => 'GB',
        'date_onboarded' => (new \DateTime('now'))->format('d-m-Y'),
        'address' => [ 'address_refinement' => 'Spongebob House, Indian Ocean, Ocean12' ],
    ]
);

$person = $railsbank->handle($command);
```

You will not need to validate data using this service.  Validation happens at the command level.  Any validation errors will return as a `DomainException` with a json error message.  

The valid response will be an immutable object, with the option to see the the full response.

Important note; we are only supporting GBP.  Our aim is to release this in v1.2.


## Commands and Queries

Action | Command or Query
---|---
GET | Query\Version\GetVersion
GET | Query\Me\Information
GET | Query\Customer\GetLedger
GET | Query\Customer\GetLedgers
GET | Query\Customer\GetEndusers
GET | Query\Customer\GetEnduser
GET | Query\Transaction\GetTransaction
GET | Query\Transaction\GetTransactions
GET | Query\Card\GetCard
GET | Query\Card\GetCards
GET | Query\Card\GetCardsByLedgerId
GET | Query\Card\GetCardImageUrl
GET | Query\Card\GetPin
GET | Query\Beneficiary\GetBeneficiaries
POST | Command\Customer\EndUsers\CreatePerson
POST | Command\Customer\Ledger\CreateLedger
POST | Command\Customer\Ledger\CloseLedger
POST | Command\Beneficiary\CreateBeneficiary
POST | Command\Transaction\CreateTransaction
POST | Command\Card\CreateCard
POST | Command\Card\ActivateCard

## Improvements

We are looking to add more queries and commands to the service after this phase.  

Create an issue if you have any problems via Github.
