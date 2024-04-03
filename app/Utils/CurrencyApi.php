<?php

namespace App\Utils;

use Illuminate\Support\Facades\Http;

class CurrencyApi
{
    /**
     * Get the base url of the API
     */
    public function getBaseUrl(): string
    {
        return config('currency_api.base_url');
    }

    /**
     * Get the date to be used in url
     */
    public function getDate(): string
    {
        return date('Y-m-d');
    }

    /**
     * Get the API Version
     */
    public function getVersion(): string
    {
        return config('currency_api.version');
    }

    /**
     * Get the API url, base url + date + version
     */
    public function getAPIUrl(): string
    {
        $baseUrl = $this->getBaseUrl();
        $date = $this->getDate();
        $version = $this->getVersion();

        return "$baseUrl@$date/$version";
    }

    /**
     * Make an API request to the endpoint
     */
    public function makeAPIRequest(string $endpoint): ?array
    {
        $apiUrl = CurrencyApi::getAPIUrl();
        $url = "$apiUrl/$endpoint";

        $response = Http::withOptions([
            'verify' => app()->isProduction(),
        ])->get($url);

        $body = $response->body();
        $result = json_decode($body, true);

        return $result;
    }

    /**
     * Execute request to get currencies from API
     */
    public function getCurrencies(): ?array
    {
        $endpoint = 'currencies.json';
        $result = $this->makeAPIRequest($endpoint);

        return $result;
    }

    /**
     * Execute request to get exchange rates from API
     */
    public function getExchangeRates(string $currency): ?array
    {
        $endpoint = "currencies/$currency.json";
        $result = $this->makeAPIRequest($endpoint);

        return $result;
    }
}
