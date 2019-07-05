# Railsbank PHP SDK Kit

[![Build Status](https://travis-ci.com/levelfiveteam/railsbank-sdk.svg?token=42A9e8Yz9HCHugYVWyzW&branch=master)](https://travis-ci.com/levelfiveteam/railsbank-sdk)


### Licence
You are free to reuse and adapt this content with credit, for non-commercial purposes.  Please review License for further information.

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
GET | Query\Version\GetVersion | \Entity\Version\VersionNumber
GET | Query\Me\Information | \Entity\Me\Information
GET | Query\Customer\GetLedger | \Entity\Customer\GetLedger
GET | Query\Customer\GetEnduser | \Entity\Customer\EndUsers\EndUser
GET | Query\Transaction\GetTransaction | \Entity\Transaction\DetailedTransaction
GET | Query\Transaction\GetTransactions | \Entity\Transaction\Transactions
POST | Command\Customer\EndUsers\Person | \Entity\Customer\EndUsers\EndUserId
POST | Command\Customer\Ledger\CreateLedger | \Entity\Customer\Ledger
POST | Command\Customer\Ledger\CloseLedger | \Entity\Customer\Ledger
POST | Command\Beneficiary\CreateBeneficiary | \Entity\Beneficiary\Beneficary

