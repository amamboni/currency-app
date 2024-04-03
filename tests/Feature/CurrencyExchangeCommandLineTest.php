<?php

namespace Tests\Feature;

use Tests\TestCase;

class CurrencyExchangeCommandLineTest extends TestCase
{
    /**
     * Test convert currency
     */
    public function test_convert_currency(): void
    {
        $this->artisan('convert-currency')
            ->expectsQuestion('Convert from which currency?', 'usd')
            ->expectsQuestion('Convert to which currency?', 'php')
            ->expectsQuestion('What is the amount?', 10)
            ->assertSuccessful();
    }
}
