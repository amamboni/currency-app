<?php

namespace App\Console\Commands;

use App\Actions\CurrencyAction;
use Illuminate\Console\Command;

class ConvertCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert the currency value to the equivalent currency';

    /**
     * Execute the console command.
     */
    public function handle(CurrencyAction $currencyAction)
    {
        $fromCurrency = $this->ask('Convert from which currency?');
        $toCurrency = $this->ask('Convert to which currency?');
        $value = $this->ask('What is the amount?');

        $exchangeRate = $currencyAction->getExchangeRate($fromCurrency, $toCurrency);
        $converted = $value * $exchangeRate;

        $this->info($converted);
    }
}
