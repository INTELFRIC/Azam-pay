<?php

declare(strict_types=1);

namespace intelfric\Azampay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \intelfric\Azampay\AzampayService setOptions(array $options)
 * @method static \intelfric\Azampay\AzampayService mobileCheckout(array $payload)
 * @method static \intelfric\Azampay\AzampayService bankCheckout(array $payload)
 * @method static \intelfric\Azampay\AzampayService getPaymentPartners()
 * @method static \intelfric\Azampay\AzampayService postCheckout(array $payload)
 * @method static \intelfric\Azampay\AzampayService createTransfer(array $payload)
 * @method static \intelfric\Azampay\AzampayService nameLookup(array $payload)
 * @method static \intelfric\Azampay\AzampayService getTransactionStatus(?array $payload)
 *
 * @author Alpha Olomi and Michael Omakei
 *
 * @see \intelfric\Azampay\Azampay
 */
class Azampay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'azampay';
    }
}
