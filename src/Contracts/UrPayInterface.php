<?php

namespace Prgayman\UrPay\Contracts;

interface UrPayInterface
{
    /**
     * Generate api token
     *
     * @return array{}
     */
    public function generateToken(): array;
}
