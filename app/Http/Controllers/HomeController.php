<?php

namespace App\Http\Controllers;

use App\Actions\CurrencyAction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(Request $request, CurrencyAction $currencyAction): Response
    {
        $fromCurrency = $request->fromCurrency ?? '';
        $toCurrency = $request->toCurrency ?? '';

        $currencies = $currencyAction->getCurrencies() ?? [];

        $rate = $fromCurrency && $toCurrency
            ? $currencyAction->getExchangeRate($fromCurrency, $toCurrency)
            : 0;

        return Inertia::render('Home/IndexPage', [
            'currencies' => $currencies,
            'fromCurrency' => $fromCurrency,
            'toCurrency' => $toCurrency,
            'rate' => $rate,
        ]);
    }
}
