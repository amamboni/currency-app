<?php

namespace App\Http\Responses;

use App\Actions\CurrencyAction;
use Illuminate\Contracts\Support\Responsable;
use Inertia\Inertia;

class HomeResponse implements Responsable
{
    /**
     * The currency action
     */
    protected CurrencyAction $currencyAction;

    /**
     * Class constructor
     */
    public function __construct(CurrencyAction $currencyAction)
    {
        $this->currencyAction = $currencyAction;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $fromCurrency = $request->fromCurrency ?? '';
        $toCurrency = $request->toCurrency ?? '';

        $currencies = $this->currencyAction->getCurrencies() ?? [];

        $rate = $fromCurrency && $toCurrency
            ? $this->currencyAction->getExchangeRate($fromCurrency, $toCurrency)
            : 0;

        return Inertia::render('Home/IndexPage', [
            'currencies' => $currencies,
            'fromCurrency' => $fromCurrency,
            'toCurrency' => $toCurrency,
            'rate' => $rate,
        ])->toResponse($request);
    }
}
