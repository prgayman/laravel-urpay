<?php

namespace Prgayman\UrPay\Facades;

use Illuminate\Support\Facades\Facade;
use Prgayman\UrPay\Contracts\UrPayInterface;

/**
 * @mixin UrPayInterface
 * @see \Prgayman\UrPay\UrPay
 */
class UrPay extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return UrPayInterface::class;
    }
}
