<?php

namespace Prgayman\UrPay\Responses;

use Illuminate\Http\Client\Response;


abstract class BaseResponse
{
    /**
     * Create a new instance of GenerateTokenResponse
     *
     * @param Response $response
     */
    public function __construct(protected Response $response)
    {
    }

    /**
     * Get Http request response
     *
     * @return Response
     */
    public function response(): Response
    {
        return $this->response;
    }

    /**
     * Determine if the request was successful.
     *
     * @return bool
     */
    public function successful(): bool
    {
        return $this->response->successful() && $this->response->json("header.status.code") == "I000000";
    }

    /**
     * Get status code
     *
     * @return string
     */
    public function statusCode(): string
    {
        return $this->response->json("header.status.code");
    }

    /**
     * Get status description
     *
     * @return string
     */
    public function statusDescription(): string
    {
        return $this->response->json("header.status.description");
    }
}
