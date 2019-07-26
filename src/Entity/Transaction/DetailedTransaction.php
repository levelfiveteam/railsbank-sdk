<?php
namespace Railsbank\Entity\Transaction;

use Railsbank\Entity\Entity;
use Railsbank\Helper\ArrayResponse;
use Railsbank\Entity\EntityInterface;

/**
 * Class DetailedTransaction
 * @package Railsbank\Entity\Transaction
 */
class DetailedTransaction extends Entity implements EntityInterface
{
    /**
     * @var string|null
     */
    private $settlementDate;

    /**
     * @var string|null
     */
    private $paymentType;

    /**
     * @var string|null
     */
    private $transactionType;

    /**
     * @var string|null
     */
    private $cardCurrency;

    /**
     * @var string|null
     */
    private $receiptId;

    /**
     * @var string|null
     */
    private $partnerProductFx;

    /**
     * @var string|null
     */
    private $paymentMethod;

    /**
     * @var string|null
     */
    private $transactionStatus;

    /**
     * @var string|null
     */
    private $transactionAuditNumber;

    /**
     * @var string|null
     */
    private $conversionRate;

    /**
     * @var string|null
     */
    private $pointOfSaleReference;

    /**
     * @var string|null
     */
    private $mccDescription;

    /**
     * @var string|null
     */
    private $ledgerToId;

    /**
     * @var string|null
     */
    private $cardExpiryDate;

    /**
     * @var string|null
     */
    private $fixedSide;

    /**
     * @var string|null
     */
    private $merchantCategoryCode;

    /**
     * @var string|null
     */
    private $pointOfSaleCountryCode;

    /**
     * @var string|null
     */
    private $transactionFee;

    /**
     * @var string|null
     */
    private $cardUsed;

    /**
     * @var string|null
     */
    private $additionalInfo;

    /**
     * @var string|null
     */
    private $merchantbankId;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var string|null
     */
    private $merchantDetails;

    /**
     * @var string|null
     */
    private $amount;

    /**
     * @var string|null
     */
    private $transactionId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $partnerProduct;

    /**
     * @var string|null
     */
    private $conversionDate;

    /**
     * @var string|null
     */
    private $beneficiaryId;

    /**
     * @var string|null
     */
    private $assetType;

    /**
     * @var string|null
     */
    private $assetClass;

    /**
     * @var string|null
     */
    private $transactionCurrency;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $pointOfSaleInfo;

    /**
     * @var string|null
     */
    private $amountLocalCurrency;

    /**
     * @var string|null
     */
    private $cardTransactionType;

    /**
     * @var string|null
     */
    private $beneficiaryAccountId;

    /**
     * @var string|null
     */
    private $sourceSortCode;

    /**
     * @var string|null
     */
    private $sourceAccountNumber;

    /**
     * @var string|null
     */
    private $sourceAccountName;

    /**
     * DetailedTransaction constructor.
     * @param mixed $response
     */
    public function __construct($response)
    {
        $response = new ArrayResponse($response);
        $this->settlementDate = $response->offsetGet('settlement_date');
        $this->paymentType = $response->offsetGet('payment_type');
        $this->transactionType = $response->offsetGet('transaction_type');
        $this->cardCurrency = $response->offsetGet('card_currency');
        $this->receiptId = $response->offsetGet('receipt_id');
        $this->partnerProductFx = $response->offsetGet('partner_product_fx');
        $this->paymentMethod = $response->offsetGet('payment_method');
        $this->transactionStatus = $response->offsetGet('transaction_status');
        $this->transactionAuditNumber = $response->offsetGet('transaction_audit_number');
        $this->conversionRate = $response->offsetGet('conversion_rate');
        $this->pointOfSaleReference = $response->offsetGet('point_of_sale_reference');
        $this->mccDescription = $response->offsetGet('mcc_description');
        $this->ledgerToId = $response->offsetGet('ledger_to_id');
        $this->cardExpiryDate = $response->offsetGet('card_expiry_date');
        $this->fixedSide = $response->offsetGet('fixed_side');
        $this->merchantCategoryCode = $response->offsetGet('merchant_category_code');
        $this->pointOfSaleCountryCode = $response->offsetGet('point_of_sale_country_code');
        $this->transactionFee = $response->offsetGet('transaction_fee');
        $this->cardUsed = $response->offsetGet('card_used');
        $this->additionalInfo = $response->offsetGet('additional_info');
        $this->merchantbankId = $response->offsetGet('merchantbank_id');
        $this->reference = $response->offsetGet('reference');
        $this->merchantDetails = $response->offsetGet('merchant_details');
        $this->transactionId = $response->offsetGet('transaction_id');
        $this->createdAt = $response->offsetGet('created_at');
        $this->partnerProduct = $response->offsetGet('partner_product');
        $this->conversionDate = $response->offsetGet('conversion_date');
        $this->beneficiaryId = $response->offsetGet('beneficiary_id');
        $this->assetClass = $response->offsetGet('asset_class');
        $this->assetType = $response->offsetGet('asset_type');
        $this->transactionCurrency = $response->offsetGet('transaction_currency');
        $this->merchantId = $response->offsetGet('merchant_id');
        $this->pointOfSaleInfo = $response->offsetGet('point_of_sale_info');
        $this->amountLocalCurrency = $response->offsetGet('amount_local_currency');
        $this->cardTransactionType = $response->offsetGet('card_transaction_type');
        $this->beneficiaryAccountId = $response->offsetGet('beneficiary_account_id');

        $transactionInfo = new ArrayResponse($response->offsetGet('transaction_info'));
        $paymentInfo = new ArrayResponse($response->offsetGet('payment_info'));
        $sourceAccount = new ArrayResponse($paymentInfo->offsetGet('sourceAccount'));

        $this->amount = $transactionInfo->offsetGet('amount');

        $this->sourceAccountName = $sourceAccount->offsetGet('accountName');
        $this->sourceAccountNumber = $sourceAccount->offsetGet('accountNumber');
        $this->sourceSortCode = $sourceAccount->offsetGet('sortCode');

        parent::__construct($response);
    }

    public function getSettlementDate(): ?string
    {
        return $this->settlementDate;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function getCardCurrency(): ?string
    {
        return $this->cardCurrency;
    }

    public function getReceiptId(): ?string
    {
        return $this->receiptId;
    }

    public function getPartnerProductFx(): ?string
    {
        return $this->partnerProductFx;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function getTransactionStatus(): ?string
    {
        return $this->transactionStatus;
    }

    public function getTransactionAuditNumber(): ?string
    {
        return $this->transactionAuditNumber;
    }

    public function getConversionRate(): ?string
    {
        return $this->conversionRate;
    }

    public function getPointOfSaleReference(): ?string
    {
        return $this->pointOfSaleReference;
    }

    public function getMccDescription(): ?string
    {
        return $this->mccDescription;
    }

    public function getLedgerToId(): ?string
    {
        return $this->ledgerToId;
    }

    public function getCardExpiryDate(): ?string
    {
        return $this->cardExpiryDate;
    }

    public function getFixedSide(): ?string
    {
        return $this->fixedSide;
    }

    public function getMerchantCategoryCode(): ?string
    {
        return $this->merchantCategoryCode;
    }

    public function getPointOfSaleCountryCode(): ?string
    {
        return $this->pointOfSaleCountryCode;
    }

    public function getTransactionFee(): ?string
    {
        return $this->transactionFee;
    }

    public function getCardUsed(): ?string
    {
        return $this->cardUsed;
    }

    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    public function getMerchantbankId(): ?string
    {
        return $this->merchantbankId;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getMerchantDetails(): ?string
    {
        return $this->merchantDetails;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getPartnerProduct(): ?string
    {
        return $this->partnerProduct;
    }

    public function getConversionDate(): ?string
    {
        return $this->conversionDate;
    }

    public function getBeneficiaryId(): ?string
    {
        return $this->beneficiaryId;
    }

    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    public function getAssetClass(): ?string
    {
        return $this->assetClass;
    }

    public function getTransactionCurrency(): ?string
    {
        return $this->transactionCurrency;
    }

    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    public function getPointOfSaleInfo(): ?string
    {
        return $this->pointOfSaleInfo;
    }

    public function getAmountLocalCurrency(): ?string
    {
        return $this->amountLocalCurrency;
    }

    public function getCardTransactionType(): ?string
    {
        return $this->cardTransactionType;
    }

    public function getBeneficiaryAccountId(): ?string
    {
        return $this->beneficiaryAccountId;
    }

    public function getSourceSortCode(): ?string
    {
        return $this->sourceSortCode;
    }

    public function getSourceAccountNumber(): ?string
    {
        return $this->sourceAccountNumber;
    }

    public function getSourceAccountName(): ?string
    {
        return $this->sourceAccountName;
    }
}
