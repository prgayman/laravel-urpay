<?php

namespace Prgayman\UrPay\Contracts;

use Illuminate\Http\Client\ConnectionException;
use Prgayman\UrPay\Responses\EcommPaymentExecuteResponse;
use Prgayman\UrPay\Responses\EcommPaymentInitiateResponse;
use Prgayman\UrPay\Responses\GenerateTokenResponse;
use Prgayman\UrPay\Responses\ResendOtpResponse;

interface UrPayInterface
{
    /**
     * Generate api token
     *
     * @param string|null $requestId
     * @return GenerateTokenResponse
     * @throws ConnectionException
     */
    public function generateToken(?string $requestId = null): GenerateTokenResponse;

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
    public function ecommPaymentInitiate(string $securityToken, string $sessionId, int|float $amount, string $transactionId, string $mobileNumber, string $currency = 'SAR', ?string $requestId = null): EcommPaymentInitiateResponse;

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
    public function resendOtp(string $securityToken, string $sessionId, string $mobileNumber, string $otpReference, string $purpose, ?string $requestId = null): ResendOtpResponse;

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
    public function ecommPaymentExecute(string $securityToken, string $sessionId, string $verificationToken, int|float $amount, string $transactionId, string $mobileNumber, string $otp, string $otpReference, string $currency = 'SAR', ?string $requestId = null): EcommPaymentExecuteResponse;
}
