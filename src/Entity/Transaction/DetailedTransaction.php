<?php
namespace LevelFiveTeam\Railsbank\Entity\Transaction;

use LevelFiveTeam\Railsbank\Entity\Entity;
use LevelFiveTeam\Railsbank\Helper\ArrayResponse;
use LevelFiveTeam\Railsbank\Entity\EntityInterface;

/**
 * Class DetailedTransaction
 * @package LevelFiveTeam\Railsbank\Entity\Transaction
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
        $this->transactionType = $response->offsetGet('transacton_type');
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
        $this->merchantbankId = $response->offsetGet('merchant_bank_id');
        $this->reference = $response->offsetGet('reference');
        $this->merchantDetails = $response->offsetGet('merchant_details');
        $this->amount = $response->offsetGet('amount');
        $this->transactionId = $response->offsetGet('transaction_id');
        $this->createdAt = $response->offsetGet('created_at');
        $this->partnerProduct = $response->offsetGet('partner_product');
        $this->conversionDate = $response->offsetGet('conversion_date');
        $this->beneficiaryId = $response->offsetGet('beneficiary_id');
        $this->assetType = $response->offsetGet('asset_type');
        $this->transactionCurrency = $response->offsetGet('transaction_currency');
        $this->merchantId = $response->offsetGet('merchant_id');
        $this->pointOfSaleInfo = $response->offsetGet('point_of_sale_info');
        $this->amountLocalCurrency = $response->offsetGet('amount_local_currency');
        $this->cardTransactionType = $response->offsetGet('card_transaction_type');
        $this->beneficiaryAccountId = $response->offsetGet('beneficiary_account_id');

        $paymentInfo = new ArrayResponse($response->offsetGet('payment_info'));
        $sourceAccount = new ArrayResponse($paymentInfo->offsetGet('sourceAccount'));

        $this->sourceAccountName = $sourceAccount->offsetGet('accountName');
        $this->sourceAccountNumber = $sourceAccount->offsetGet('accountNumber');
        $this->sourceSortCode = $sourceAccount->offsetGet('sortCode');

        parent::__construct($response);
    }

    /**
     * @return string|null
     */
    public function getSettlementDate(): ?string
    {
        return $this->settlementDate;
    }

    /**
     * @return string|null
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @return string|null
     */
    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    /**
     * @return string|null
     */
    public function getCardCurrency(): ?string
    {
        return $this->cardCurrency;
    }

    /**
     * @return string|null
     */
    public function getReceiptId(): ?string
    {
        return $this->receiptId;
    }

    /**
     * @return string|null
     */
    public function getPartnerProductFx(): ?string
    {
        return $this->partnerProductFx;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    /**
     * @return string|null
     */
    public function getTransactionStatus(): ?string
    {
        return $this->transactionStatus;
    }

    /**
     * @return string|null
     */
    public function getTransactionAuditNumber(): ?string
    {
        return $this->transactionAuditNumber;
    }

    /**
     * @return string|null
     */
    public function getConversionRate(): ?string
    {
        return $this->conversionRate;
    }

    /**
     * @return string|null
     */
    public function getPointOfSaleReference(): ?string
    {
        return $this->pointOfSaleReference;
    }

    /**
     * @return string|null
     */
    public function getMccDescription(): ?string
    {
        return $this->mccDescription;
    }

    /**
     * @return string|null
     */
    public function getLedgerToId(): ?string
    {
        return $this->ledgerToId;
    }

    /**
     * @return string|null
     */
    public function getCardExpiryDate(): ?string
    {
        return $this->cardExpiryDate;
    }

    /**
     * @return string|null
     */
    public function getFixedSide(): ?string
    {
        return $this->fixedSide;
    }

    /**
     * @return string|null
     */
    public function getMerchantCategoryCode(): ?string
    {
        return $this->merchantCategoryCode;
    }

    /**
     * @return string|null
     */
    public function getPointOfSaleCountryCode(): ?string
    {
        return $this->pointOfSaleCountryCode;
    }

    /**
     * @return string|null
     */
    public function getTransactionFee(): ?string
    {
        return $this->transactionFee;
    }

    /**
     * @return string|null
     */
    public function getCardUsed(): ?string
    {
        return $this->cardUsed;
    }

    /**
     * @return string|null
     */
    public function getAdditionalInfo(): ?string
    {
        return $this->additionalInfo;
    }

    /**
     * @return string|null
     */
    public function getMerchantbankId(): ?string
    {
        return $this->merchantbankId;
    }

    /**
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @return string|null
     */
    public function getMerchantDetails(): ?string
    {
        return $this->merchantDetails;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string|null
     */
    public function getPartnerProduct(): ?string
    {
        return $this->partnerProduct;
    }

    /**
     * @return string|null
     */
    public function getConversionDate(): ?string
    {
        return $this->conversionDate;
    }

    /**
     * @return string|null
     */
    public function getBeneficiaryId(): ?string
    {
        return $this->beneficiaryId;
    }

    /**
     * @return string|null
     */
    public function getAssetType(): ?string
    {
        return $this->assetType;
    }

    /**
     * @return string|null
     */
    public function getAssetClass(): ?string
    {
        return $this->assetClass;
    }

    /**
     * @return string|null
     */
    public function getTransactionCurrency(): ?string
    {
        return $this->transactionCurrency;
    }

    /**
     * @return string|null
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @return string|null
     */
    public function getPointOfSaleInfo(): ?string
    {
        return $this->pointOfSaleInfo;
    }

    /**
     * @return string|null
     */
    public function getAmountLocalCurrency(): ?string
    {
        return $this->amountLocalCurrency;
    }

    /**
     * @return string|null
     */
    public function getCardTransactionType(): ?string
    {
        return $this->cardTransactionType;
    }

    /**
     * @return string|null
     */
    public function getBeneficiaryAccountId(): ?string
    {
        return $this->beneficiaryAccountId;
    }

    /**
     * @return string|null
     */
    public function getSourceSortCode(): ?string
    {
        return $this->sourceSortCode;
    }

    /**
     * @return string|null
     */
    public function getSourceAccountNumber(): ?string
    {
        return $this->sourceAccountNumber;
    }

    /**
     * @return string|null
     */
    public function getSourceAccountName(): ?string
    {
        return $this->sourceAccountName;
    }
}
