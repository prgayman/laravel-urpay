<?php

namespace Prgayman\UrPay;

use Prgayman\UrPay\Contracts\UrPayInterface;
use Prgayman\UrPay\Responses\EcommPaymentExecuteResponse;
use Prgayman\UrPay\Responses\EcommPaymentInitiateResponse;
use Prgayman\UrPay\Responses\GenerateTokenResponse;
use Prgayman\UrPay\Responses\ResendOtpResponse;

class UrPay implements UrPayInterface
{
    /**
     * UrPay Client
     *
     * @var Client
     */
    protected Client $client;

    /**
     * Create a new instance of UrPay
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /** @inheritDoc */
    public function generateToken(?string $requestId = null): GenerateTokenResponse
    {
        return $this->client->generateToken($requestId);
    }

    /** @inheritDoc */
    public function ecommPaymentInitiate(string $securityToken, string $sessionId, float|int $amount, string $transactionId, string $mobileNumber, string $currency = 'SAR', ?string $requestId = null): EcommPaymentInitiateResponse
    {
        return $this->client->ecommPaymentInitiate($securityToken, $sessionId, $amount, $transactionId, $mobileNumber, $currency, $requestId);
    }

    /** @inheritDoc */
    public function resendOtp(string $securityToken, string $sessionId, string $mobileNumber, string $otpReference, string $purpose, ?string $requestId = null): ResendOtpResponse
    {
        return $this->client->resendOtp($securityToken, $sessionId, $mobileNumber, $otpReference, $requestId);
    }

    /** @inheritDoc */
    public function ecommPaymentExecute(string $securityToken, string $sessionId, string $verificationToken, float|int $amount, string $transactionId, string $mobileNumber, string $otp, string $otpReference, string $currency = 'SAR', ?string $requestId = null): EcommPaymentExecuteResponse
    {
        return $this->client->ecommPaymentExecute($securityToken, $sessionId, $verificationToken, $amount, $transactionId, $mobileNumber, $otp, $otpReference, $currency, $requestId);
    }
}
