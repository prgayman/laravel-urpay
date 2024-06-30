<?php

namespace Prgayman\UrPay\Responses;

class ResendOtpResponse extends BaseResponse
{
    /**
     * Get otp reference
     *
     * @return string
     */
    public function otpReference(): string
    {
        return $this->response->json('body.otpReference');
    }
}
