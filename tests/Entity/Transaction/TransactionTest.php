<?php

namespace Test\Entity\Transaction;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Transaction\DetailedTransaction;
use Railsbank\Entity\Transaction\Transaction;

class TransactionTest extends TestCase
{
    public function testTransaction()
    {
        $response = [
            'created_at' => '2019-01-01',
            'ledger_entry_id' => '1233123-123123-21321',
            'transaction_id' => '123123',
            'amount' => '123.22',
            'ledger_entry_type' => 'credit',
        ];

        $entity = new Transaction($response);

        self::assertEquals('2019-01-01', $entity->getCreatedAt());
        self::assertEquals('1233123-123123-21321', $entity->getLedgerEntryId());
        self::assertEquals('123123', $entity->getTransactionId());
        self::assertEquals('123.22', $entity->getAmount());
        self::assertEquals('credit', $entity->getLedgerEntryType());
        self::assertTrue($entity->isCredit());
        self::assertFalse($entity->isDebit());

        $response = [
            'settlement_date' => '2018-05-27',
            'payment_type' => 'payment-type-EU-SEPA-Step2',
            'transaction_type' => 'transaction-type-send',
            'card_currency' => 'USD',
            'receipt_id' => 'a12345678901234',
            'amount_beneficiary_account' => '0',
            'partner_product_fx' => 'PayrNet-FX-1',
            'card_rules_breached' =>
                [
                    0 => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                    1 => '8763b5df-a61c-4f77-9724-41ca9cde3654',
                    2 => '8763b5df-a61c-4f77-9724-41ca9cde3654',
                ],
            'payment_method' => 'swift',
            'payment_info' =>
                [
                    'foo' => 'bar',
                ],
            'return_info' =>
                [
                    'foo' => 'bar',
                ],
            'transaction_status' => 'transaction-status-accepted',
            'transaction_audit_number' => '122436',
            'conversion_rate' => '1.69',
            'point_of_sale_reference' => '000000001631',
            'missing_data' =>
                [
                    0 => 'keyword',
                    1 => 'fooBar',
                    2 => 'fooBar',
                ],
            'mcc_description' => 'Veterinary Services',
            'ledger_to_id' => '8763b5df-a61c-4f77-9724-41ca9cde3654',
            'card_expiry_date' => '07-19',
            'fixed_side' => 'beneficiary',
            'merchant_category_code' => '7523',
            'point_of_sale_country_code' => 'GB',
            'transaction_fee' => '0',
            'card_used' => '454704641',
            'additional_info' => 'T6105000019203927',
            'merchantbank_id' => '012216',
            'transaction_info' =>
                [
                    'ultimate_receiver' =>
                        [
                            'issuer' => 'string',
                            'birth_country' => 'abcdefghijklmnopqrstuvwxyz',
                            'bic' => 'abcdefghijklmnopqrstuvwxyz',
                            'id' => 'string',
                            'name' => 'John Doe',
                            'address' =>
                                [
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ],
                            'birth_date' => 'string',
                            'scheme_proprietary' => 'string',
                            'birth_city' => 'random sequence of characters',
                            'scheme' => 'string',
                            'birth_province' => 'abcdefghijklmnopqrstuvwxyz',
                        ],
                    'settlement_date' => '2017-03-01',
                    'end_to_end_id' => 'NOTPROVIDED',
                    'instructed_agent' =>
                        [
                            'bic' => 'SPSRSKBAXXX',
                        ],
                    'purpose_category' => 'SALA',
                    'receiver_account' =>
                        [
                            'iban' => 'SK4402005678901234567890',
                        ],
                    'currency' => 'EUR',
                    'settlement_method' => 'CLRG',
                    'charge_bearer' => 'SLEV',
                    'purpose_category_proprietary' => 'string',
                    'local_instrument' => 'string',
                    'service_level' => 'SEPA',
                    'clearing_system_proprietary' => 'string',
                    'receiver_agent' =>
                        [
                            'bic' => 'SPSRSKBAXXX',
                        ],
                    'local_instrument_proprietary' => 'string',
                    'receiver' =>
                        [
                            'issuer' => 'string',
                            'birth_country' => 'string',
                            'bic' => 'abcdefghijklmnopqrstuvwxyz',
                            'id' => 'abcdefghijklmnopqrstuvwxyz',
                            'name' => 'John Doe',
                            'address' =>
                                [
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ],
                            'birth_date' => 'random sequence of characters',
                            'scheme_proprietary' => 'string',
                            'birth_city' => 'abcdefghijklmnopqrstuvwxyz',
                            'scheme' => 'string',
                            'birth_province' => 'abcdefghijklmnopqrstuvwxyz',
                        ],
                    'clearing_system' => 'abcdefghijklmnopqrstuvwxyz',
                    'sender_account' =>
                        [
                            'iban' => 'SK4402005678901234567890',
                        ],
                    'ultimate_sender' =>
                        [
                            'issuer' => 'abcdefghijklmnopqrstuvwxyz',
                            'birth_country' => 'random sequence of characters',
                            'bic' => 'string',
                            'id' => 'abcdefghijklmnopqrstuvwxyz',
                            'name' => 'John Doe',
                            'address' =>
                                [
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ],
                            'birth_date' => 'abcdefghijklmnopqrstuvwxyz',
                            'scheme_proprietary' => 'abcdefghijklmnopqrstuvwxyz',
                            'birth_city' => 'string',
                            'scheme' => 'string',
                            'birth_province' => 'string',
                        ],
                    'settlement_account' =>
                        [
                            'iban' => 'SK4402005678901234567890',
                        ],
                    'instruction_id' => 'TEST-001-INSTR',
                    'amount' => '1.00',
                    'transaction_id' => 'TEST-001-TX',
                    'remittance_information_unstructured' => 'this is a test payment',
                    'created_at' => '2000-01-01T00:00:00.000Z',
                    'sender_agent' =>
                        [
                            'bic' => 'SPSRSKBAXXX',
                        ],
                    'message_schema' => 'pacs.008.001.02',
                    'sender' =>
                        [
                            'name' => 'Sandy Sender',
                            'address' =>
                                [
                                    'country' => 'GB',
                                    'lines' => 'Staveley Road
London',
                                ],
                        ],
                    'instructing_agent' =>
                        [
                            'bic' => 'SPSRSKBAXXX',
                        ],
                    'purpose' => 'SALA',
                    'message_id' => 'TEST-001-MSG',
                ],
            'reference' => 'this is a test payment',
            'swift_service_level' => 'service-level-same-day-value',
            'merchant_details' => 'PAYBYPHONE RE ST ALBAN HATFIELD GBR',
            'amount' => '0',
            'failure_reasons' =>
                [
                    0 => 'contact-support',
                    1 => 'partner-error',
                    2 => 'card-rules-breached',
                ],
            'ledger_from_id' => '8763b5df-a61c-4f77-9724-41ca9cde3654',
            'transaction_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
            'amount_ledger_from' => '0',
            'card_entry_method' => '01',
            'reason' => 'random sequence of characters',
            'created_at' => '2000-01-01T00:00:00.000Z',
            'partner_product' => 'ExampleBank-EUR-1',
            'conversion_date' => '2018-05-26',
            'beneficiary_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
            'transaction_printout' =>
                [
                    'foo' => 'bar',
                ],
            'daily_unique_refence' => 'MDSL2EKYF',
            'asset_type' => 'eur',
            'asset_class' => 'currency',
            'swift_charge_bearer' => 'charge-bearer-shared',
            'transaction_currency' => 'GBP',
            'transaction_meta' =>
                [
                    'foo' => 'bar',
                ],
            'rejection_reasons' =>
                [
                    0 => 'beneficiary-account-closed',
                    1 => 'beneficiary-sort-code-and-account-number-unknown',
                    2 => 'account-number-invalid',
                ],
            'invoices' =>
                [
                    0 =>
                        [
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => 'c91b339e-57d7-41ea-a805-8966ce8fe4ed',
                            'description' => 'description',
                        ],
                    1 =>
                        [
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                            'description' => 'description',
                        ],
                    2 =>
                        [
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => '753fa673-66b4-4c94-9ddb-f9f4b5c1e9a3',
                            'description' => 'description',
                        ],
                ],
            'merchant_id' => 'a1234567',
            'point_of_sale_info' => '0001110000500826AL9',
            'amount_local_currency' => '1.50',
            'card_transaction_type' => 'Purchase',
            'beneficiary_account_id' => '6630b391-c5ce-46c1-9d23-a82a9e27f82d',
        ];

        $detailedTransaction = new DetailedTransaction($response);

        $entity->setDetailedTransaction($detailedTransaction);
        self::assertInstanceOf(DetailedTransaction::class, $entity->getDetailedTransaction());
    }
}
