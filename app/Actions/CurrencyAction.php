<?php

namespace App\Actions;

use App\Traits\HasCache;
use App\Utils\CurrencyApi;

class CurrencyAction
{
    use HasCache;

    /**
     * The Currency API Util
     */
    private CurrencyApi $currencyApi;

    /**
     * The key used in caching date
     */
    private string $cacheDateKey = 'date';

    /**
     * The key used in caching currencies
     */
    private string $cacheCurrenciesKey = 'currencies';

    /**
     * The prefix used for keys in caching exchange rates
     */
    private string $cacheExchangeRateKey = 'exchange_rate';

    /**
     * Class constructor
     */
    public function __construct(CurrencyApi $currencyApi)
    {
        $this->currencyApi = $currencyApi;
    }

    /**
     * Determine if storing to cache: if cached date is not equal to current date
     */
    private function isStoringToCache(): bool
    {
        $cacheKey = $this->cacheDateKey;

        $cachedDate = $this->cacheGet($cacheKey);
        $currentDate = date('Y-m-d');

        if ($currentDate !== $cachedDate) {
            $this->cacheForever($cacheKey, $currentDate);

            return true;
        }

        return false;
    }

    /**
     * Get the currencies list
     */
    public function getCurrencies(): ?array
    {
        $cacheKey = $this->cacheCurrenciesKey;

        // If storing to cache, get the currencies
        // from API then store to cache
        if ($this->isStoringToCache()) {
            $currencies = $this->currencyApi->getCurrencies();

            $this->cacheForever($cacheKey, $currencies);
        }

        $result = $this->cacheGet($cacheKey);

        return $result;
    }

    /**
     * Get the value of exchange rate
     */
    public function getExchangeRate(?string $fromCurrency, ?string $toCurrency): ?float
    {
        $cacheKey = implode('_', [$this->cacheExchangeRateKey, $fromCurrency]);

        // If storing to cache or key does not exists yet, get the
        // exchange rates from API then store to cache
        if ($this->isStoringToCache() || ! $this->cacheKeyExists($cacheKey)) {
            $rates = $this->currencyApi->getExchangeRates($fromCurrency);

            $this->cacheForever($cacheKey, $rates[$fromCurrency]);
        }

        $rates = $this->cacheGet($cacheKey);

        $rate = $rates[$toCurrency] ?? 0;

        return $rate;
    }

    /**
     * Get the converted currency amount
     */
    public function getConvertedAmount(?string $fromCurrency, ?string $toCurrency, ?float $amount): ?float
    {
        $rate = $this->getExchangeRate($fromCurrency, $toCurrency);

        return $rate * $amount;
    }
}
