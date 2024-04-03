<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class InvalidToCurrencyException extends Exception
{
    /**
     * The currency
     */
    protected string $currency;

    /**
     * Class constructor
     */
    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::error('Invalid To Currency: '.$this->currency);
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response('Invalid To Currency: '.$this->currency, 400);
    }
}
