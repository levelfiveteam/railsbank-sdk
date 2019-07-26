<?php

namespace Test\Entity\Transaction;

use PHPUnit\Framework\TestCase;
use Railsbank\Entity\Transaction\DetailedTransaction;

class DetailedTransactionTest extends TestCase
{
    public function testDetailedTransaction()
    {
        $response = array(
            'settlement_date' => '2018-05-27',
            'payment_type' => 'payment-type-EU-SEPA-Step2',
            'transaction_type' => 'transaction-type-send',
            'card_currency' => 'USD',
            'receipt_id' => 'a12345678901234',
            'amount_beneficiary_account' => '0',
            'partner_product_fx' => 'PayrNet-FX-1',
            'card_rules_breached' =>
                array(
                    0 => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                    1 => '8763b5df-a61c-4f77-9724-41ca9cde3654',
                    2 => '8763b5df-a61c-4f77-9724-41ca9cde3654',
                ),
            'payment_method' => 'swift',
            'payment_info' =>
                array(
                    'foo' => 'bar',
                ),
            'return_info' =>
                array(
                    'foo' => 'bar',
                ),
            'transaction_status' => 'transaction-status-accepted',
            'transaction_audit_number' => '122436',
            'conversion_rate' => '1.69',
            'point_of_sale_reference' => '000000001631',
            'missing_data' =>
                array(
                    0 => 'keyword',
                    1 => 'fooBar',
                    2 => 'fooBar',
                ),
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
                array(
                    'ultimate_receiver' =>
                        array(
                            'issuer' => 'string',
                            'birth_country' => 'abcdefghijklmnopqrstuvwxyz',
                            'bic' => 'abcdefghijklmnopqrstuvwxyz',
                            'id' => 'string',
                            'name' => 'John Doe',
                            'address' =>
                                array(
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ),
                            'birth_date' => 'string',
                            'scheme_proprietary' => 'string',
                            'birth_city' => 'random sequence of characters',
                            'scheme' => 'string',
                            'birth_province' => 'abcdefghijklmnopqrstuvwxyz',
                        ),
                    'settlement_date' => '2017-03-01',
                    'end_to_end_id' => 'NOTPROVIDED',
                    'instructed_agent' =>
                        array(
                            'bic' => 'SPSRSKBAXXX',
                        ),
                    'purpose_category' => 'SALA',
                    'receiver_account' =>
                        array(
                            'iban' => 'SK4402005678901234567890',
                        ),
                    'currency' => 'EUR',
                    'settlement_method' => 'CLRG',
                    'charge_bearer' => 'SLEV',
                    'purpose_category_proprietary' => 'string',
                    'local_instrument' => 'string',
                    'service_level' => 'SEPA',
                    'clearing_system_proprietary' => 'string',
                    'receiver_agent' =>
                        array(
                            'bic' => 'SPSRSKBAXXX',
                        ),
                    'local_instrument_proprietary' => 'string',
                    'receiver' =>
                        array(
                            'issuer' => 'string',
                            'birth_country' => 'string',
                            'bic' => 'abcdefghijklmnopqrstuvwxyz',
                            'id' => 'abcdefghijklmnopqrstuvwxyz',
                            'name' => 'John Doe',
                            'address' =>
                                array(
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ),
                            'birth_date' => 'random sequence of characters',
                            'scheme_proprietary' => 'string',
                            'birth_city' => 'abcdefghijklmnopqrstuvwxyz',
                            'scheme' => 'string',
                            'birth_province' => 'abcdefghijklmnopqrstuvwxyz',
                        ),
                    'clearing_system' => 'abcdefghijklmnopqrstuvwxyz',
                    'sender_account' =>
                        array(
                            'iban' => 'SK4402005678901234567890',
                        ),
                    'ultimate_sender' =>
                        array(
                            'issuer' => 'abcdefghijklmnopqrstuvwxyz',
                            'birth_country' => 'random sequence of characters',
                            'bic' => 'string',
                            'id' => 'abcdefghijklmnopqrstuvwxyz',
                            'name' => 'John Doe',
                            'address' =>
                                array(
                                    'country' => 'GB',
                                    'lines' => '27 Old Gloucester Street
London',
                                ),
                            'birth_date' => 'abcdefghijklmnopqrstuvwxyz',
                            'scheme_proprietary' => 'abcdefghijklmnopqrstuvwxyz',
                            'birth_city' => 'string',
                            'scheme' => 'string',
                            'birth_province' => 'string',
                        ),
                    'settlement_account' =>
                        array(
                            'iban' => 'SK4402005678901234567890',
                        ),
                    'instruction_id' => 'TEST-001-INSTR',
                    'amount' => '1.00',
                    'transaction_id' => 'TEST-001-TX',
                    'remittance_information_unstructured' => 'this is a test payment',
                    'created_at' => '2000-01-01T00:00:00.000Z',
                    'sender_agent' =>
                        array(
                            'bic' => 'SPSRSKBAXXX',
                        ),
                    'message_schema' => 'pacs.008.001.02',
                    'sender' =>
                        array(
                            'name' => 'Sandy Sender',
                            'address' =>
                                array(
                                    'country' => 'GB',
                                    'lines' => 'Staveley Road
London',
                                ),
                        ),
                    'instructing_agent' =>
                        array(
                            'bic' => 'SPSRSKBAXXX',
                        ),
                    'purpose' => 'SALA',
                    'message_id' => 'TEST-001-MSG',
                ),
            'reference' => 'this is a test payment',
            'swift_service_level' => 'service-level-same-day-value',
            'merchant_details' => 'PAYBYPHONE RE ST ALBAN HATFIELD GBR',
            'amount' => '0',
            'failure_reasons' =>
                array(
                    0 => 'contact-support',
                    1 => 'partner-error',
                    2 => 'card-rules-breached',
                ),
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
                array(
                    'foo' => 'bar',
                ),
            'daily_unique_refence' => 'MDSL2EKYF',
            'asset_type' => 'eur',
            'asset_class' => 'currency',
            'swift_charge_bearer' => 'charge-bearer-shared',
            'transaction_currency' => 'GBP',
            'transaction_meta' =>
                array(
                    'foo' => 'bar',
                ),
            'rejection_reasons' =>
                array(
                    0 => 'beneficiary-account-closed',
                    1 => 'beneficiary-sort-code-and-account-number-unknown',
                    2 => 'account-number-invalid',
                ),
            'invoices' =>
                array(
                    0 =>
                        array(
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => 'c91b339e-57d7-41ea-a805-8966ce8fe4ed',
                            'description' => 'description',
                        ),
                    1 =>
                        array(
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => 'bb8b2428-f94c-41df-8e82-a895ab4d6ac8',
                            'description' => 'description',
                        ),
                    2 =>
                        array(
                            'created_at' => '2000-01-01T00:00:00.000Z',
                            'document_id' => '753fa673-66b4-4c94-9ddb-f9f4b5c1e9a3',
                            'description' => 'description',
                        ),
                ),
            'merchant_id' => 'a1234567',
            'point_of_sale_info' => '0001110000500826AL9',
            'amount_local_currency' => '1.50',
            'card_transaction_type' => 'Purchase',
            'beneficiary_account_id' => '6630b391-c5ce-46c1-9d23-a82a9e27f82d',
        );

        $entity = new DetailedTransaction($response);

        self::assertEquals('2018-05-27', $entity->getSettlementDate());
        self::assertEquals('payment-type-EU-SEPA-Step2', $entity->getPaymentType());
        self::assertEquals('transaction-type-send', $entity->getTransactionType());
        self::assertEquals('USD', $entity->getCardCurrency());
        self::assertEquals('a12345678901234', $entity->getReceiptId());
        self::assertEquals('PayrNet-FX-1', $entity->getPartnerProductFx());
        self::assertEquals('swift', $entity->getPaymentMethod());
        self::assertEquals('transaction-status-accepted', $entity->getTransactionStatus());
        self::assertEquals('122436', $entity->getTransactionAuditNumber());
        self::assertEquals('1.69', $entity->getConversionRate());
        self::assertEquals('000000001631', $entity->getPointOfSaleReference());
        self::assertEquals('Veterinary Services', $entity->getMccDescription());
        self::assertEquals('8763b5df-a61c-4f77-9724-41ca9cde3654', $entity->getLedgerToId());
        self::assertEquals('07-19', $entity->getCardExpiryDate());
        self::assertEquals('7523', $entity->getMerchantCategoryCode());
        self::assertEquals('GB', $entity->getPointOfSaleCountryCode());
        self::assertEquals('0', $entity->getTransactionFee());
        self::assertEquals('454704641',$entity->getCardUsed());
        self::assertEquals('T6105000019203927', $entity->getAdditionalInfo());
        self::assertEquals('012216', $entity->getMerchantbankId());
        self::assertEquals('2000-01-01T00:00:00.000Z', $entity->getCreatedAt());
        self::assertEquals('beneficiary', $entity->getFixedSide());
        self::assertEquals('this is a test payment', $entity->getReference());
        self::assertEquals('PAYBYPHONE RE ST ALBAN HATFIELD GBR', $entity->getMerchantDetails());
        self::assertEquals('1.00', $entity->getAmount());
        self::assertEquals('2018-05-26', $entity->getConversionDate());
        self::assertEquals('bb8b2428-f94c-41df-8e82-a895ab4d6ac8', $entity->getBeneficiaryId());
        self::assertEquals('eur', $entity->getAssetType());
        self::assertEquals('currency', $entity->getAssetClass());
        self::assertEquals('GBP', $entity->getTransactionCurrency());
        self::assertEquals('a1234567', $entity->getMerchantId());
        self::assertEquals('0001110000500826AL9', $entity->getPointOfSaleInfo());
        self::assertEquals('1.50', $entity->getAmountLocalCurrency());
        self::assertEquals('Purchase', $entity->getCardTransactionType());
        self::assertEquals('TEST-001-TX', $entity->getTransactionId());
        self::assertEquals('ExampleBank-EUR-1', $entity->getPartnerProduct());
    }
}
