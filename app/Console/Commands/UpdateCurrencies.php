<?php

namespace App\Console\Commands;

use App\Standards\Currencies\Classes\Currencies;
use Illuminate\Console\Command;


class UpdateCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates currencies by the current day';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Currencies::currenciesProcessing();

        $this->info('Currencies updated successfully.');
    }
}
