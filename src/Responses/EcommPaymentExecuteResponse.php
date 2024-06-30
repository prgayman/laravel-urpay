<?php

namespace Prgayman\UrPay\Responses;

class EcommPaymentExecuteResponse extends BaseResponse
{
    /**
     * Get transaction reference id
     *
     * @return string
     */
    public function transactionReferenceId(): string
    {
        return $this->response->json('body.transactionReferenceId');
    }
}
