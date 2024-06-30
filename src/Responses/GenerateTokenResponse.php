<?php

namespace Prgayman\UrPay\Responses;

class GenerateTokenResponse extends BaseResponse
{
    /**
     * Get Request id
     *
     * @return string
     */
    public function requestId(): string
    {
        return $this->response->json("header.requestId");
    }

    /**
     * Get expires in
     *
     * @return int
     */
    public function expiresIn(): int
    {
        return $this->response->json("body.expiresIn");
    }

    /**
     * Get header X-Session-Id
     *
     * @return string
     */
    public function sessionId(): string
    {
        return $this->response->header("X-Session-Id");
    }

    /**
     * Get header X-Security-Token id
     *
     * @return string
     */
    public function securityToken(): string
    {
        return $this->response->header("X-Security-Token");
    }

    /**
     * Get header X-Refresh-Security-Token
     *
     * @return string
     */
    public function refreshSecurityToken(): string
    {
        return $this->response->header("X-Refresh-Security-Token");
    }

    /**
     * Get header X-Global-Transaction-ID
     *
     * @return string
     */
    public function globalTransactionId(): string
    {
        return $this->response->header("X-Global-Transaction-ID");
    }
}

