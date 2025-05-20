<?php

use App\Standards\Logs\Enums\LogChannelsEnum;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

if (!Schema::hasTable('settings'))
{
    \Illuminate\Support\Facades\Schedule::command('currencies:update')
        ->cron(str_replace('_', ' ', \App\Standards\Settings\SettingsEnum::CRON_AUTOUPDATE_INTERVAL->getValue()))
        ->onSuccess(function ()
        {
            \Illuminate\Support\Facades\Log::channel(LogChannelsEnum::CURRENCIES->value)->info('Successfully updated currencies.');
        })
        ->onFailure(function ()
        {
            \Illuminate\Support\Facades\Log::channel(LogChannelsEnum::CURRENCIES->value)->error('Failed to update currencies.');
        });
}
