<?php

namespace Prgayman\UrPay;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Prgayman\UrPay\Responses\EcommPaymentExecuteResponse;
use Prgayman\UrPay\Responses\EcommPaymentInitiateResponse;
use Prgayman\UrPay\Responses\GenerateTokenResponse;
use Prgayman\UrPay\Responses\ResendOtpResponse;

class Client
{
    /**
     * Register UrPay Config
     *
     * @var array
     */
    protected array $config;

    /**
     * Api base url
     *
     * @var string
     */
    protected string $baseUrl = "https://walletsit.neoleap.com.sa/merchantb2b/";

    /**
     * Create a new instance of client
     *
     * @return void
     */
    public function __construct()
    {
        $this->config = config('urpay');
    }

    /**
     * Get default headers
     *
     * @param string|null $requestId
     * @return array
     */
    protected function defaultHeaders(?string $requestId = null): array
    {
        return [
            "X-Request-Id" => $requestId ?: uniqid(),
            "X-Client-Id" => $this->config['client_id'],
            "X-Session-Language" => $this->config['session_language'],
        ];
    }

    /**
     * Generate api token
     *
     * @param string|null $requestId
     * @return GenerateTokenResponse
     * @throws ConnectionException
     */
    public function generateToken(?string $requestId = null): GenerateTokenResponse
    {
        return new GenerateTokenResponse(
            Http::withHeaders($this->defaultHeaders($requestId))
                ->post(
                    "{$this->baseUrl}/v1/payments/merchant/generatetoken",
                    [
                        "userName" => $this->config['username'],
                        "password" => $this->config['password'],
                    ]
                )
        );
    }

    /**
     * Ecomm payment initiate
     *
     * @param string $securityToken
     * @param string $sessionId
     * @param int|float $amount
     * @param string $transactionId
     * @param string $mobileNumber
     * @param string $currency
     * @param string|null $requestId
     * @return EcommPaymentInitiateResponse
     * @throws ConnectionException
     */
    public function ecommPaymentInitiate(
        string    $securityToken,
        string    $sessionId,
        int|float $amount,
        string    $transactionId,
        string    $mobileNumber,
        string    $currency = 'SAR',
        ?string   $requestId = null,

    ): EcommPaymentInitiateResponse
    {
        return new EcommPaymentInitiateResponse(
            Http::withHeaders([
                ...$this->defaultHeaders($requestId),
                "X-Security-Token" => $securityToken,
                "X-Session-Id" => $sessionId
            ])
                ->post(
                    "{$this->baseUrl}/v1/payments/ecomm/initiate",
                    [
                        "transactionInfo" => [
                            "amount" => ["currency" => $currency, "value" => $amount],
                            "externalTransactionId" => $transactionId,
                            "sourceConsumerMobileNumber" => $mobileNumber,
                            "targetMerchantId" => $this->config['merchant_id'],
                            "targetMerchantWalletNumber" => $this->config['merchant_wallet_number'],
                            "targetTerminalId" => $this->config['terminal_id']
                        ]
                    ]
                )
        );
    }

    /**
     * Resend OTP
     *
     * @param string $securityToken
     * @param string $sessionId
     * @param string $mobileNumber
     * @param string $otpReference
     * @param string $purpose
     * @param string|null $requestId
     * @return ResendOtpResponse
     * @throws ConnectionException
     */
    public function resendOtp(
        string  $securityToken,
        string  $sessionId,
        string  $mobileNumber,
        string  $otpReference,
        string  $purpose,
        ?string $requestId = null,
    ): ResendOtpResponse
    {
        return new ResendOtpResponse(
            Http::withHeaders([
                ...$this->defaultHeaders($requestId),
                "X-Security-Token" => $securityToken,
                "X-Session-Id" => $sessionId
            ])
                ->post(
                    "{$this->baseUrl}/v1/otp/resend",
                    [
                        "mobileNumber" => $mobileNumber,
                        "otpReference" => $otpReference,
                        "purpose" => $purpose
                    ]
                )
        );
    }

    /**
     * Ecomm payment execute
     *
     * @param string $securityToken
     * @param string $sessionId
     * @param string $verificationToken
     * @param int|float $amount
     * @param string $transactionId
     * @param string $mobileNumber
     * @param string $otp
     * @param string $otpReference
     * @param string $currency
     * @param string|null $requestId
     * @return EcommPaymentExecuteResponse
     * @throws ConnectionException
     */
    public function ecommPaymentExecute(
        string    $securityToken,
        string    $sessionId,
        string    $verificationToken,
        int|float $amount,
        string    $transactionId,
        string    $mobileNumber,
        string    $otp,
        string    $otpReference,
        string    $currency = 'SAR',
        ?string   $requestId = null,
    ): EcommPaymentExecuteResponse
    {
        return new EcommPaymentExecuteResponse(
            Http::withHeaders([
                ...$this->defaultHeaders($requestId),
                "X-Security-Token" => $securityToken,
                "X-Session-Id" => $sessionId,
                "X-Verification-Token" => $verificationToken,
            ])
                ->post(
                    "{$this->baseUrl}/v1/payments/ecomm/execute",
                    [
                        "transactionInfo" => [
                            "amount" => ["currency" => $currency, "value" => $amount],
                            "externalTransactionId" => $transactionId,
                            "sourceConsumerMobileNumber" => $mobileNumber,
                            "targetMerchantId" => $this->config['merchant_id'],
                            "targetMerchantWalletNumber" => $this->config['merchant_wallet_number'],
                            "targetTerminalId" => $this->config['terminal_id'],
                        ],
                        "OTPInfo" => [
                            "otp" => $otp,
                            "otpReference" => $otpReference
                        ]
                    ]
                )
        );
    }
}
