<?php

namespace Prgayman\UrPay\Responses;

class EcommPaymentInitiateResponse extends BaseResponse
{
    /**
     * Get merchant brand name english and arabic
     *
     * @return array
     */
    public function merchantBrandName(): array
    {
        return [
            "ar" => $this->response->json('body.merchantBrandNameAr'),
            "en" => $this->response->json('body.merchantBrandNameEn'),
        ];
    }

    /**
     * Get otp reference
     *
     * @return string
     */
    public function otpReference(): string
    {
        return $this->response->json('body.otpReference');
    }

    /**
     * Get header X-Verification-Token
     *
     * @return string
     */
    public function verificationToken(): string
    {
        return $this->response->header('X-Verification-Token');
    }
}
