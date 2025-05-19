<?php

namespace App\Standards\Settings;


use App\Repositories\SettingsRepository;


/**
 * The enum contains all possible keys of Settings.
 */
enum SettingsEnum: string
{
    case WIDGET_AUTOUPDATE_INTERVAL = 'widget-autoupdate-interval';

    case CRON_AUTOUPDATE_INTERVAL = 'cron-autoupdate-interval';

    case CACHE_TIMEOUT = 'cache-timeout';

    case CURRENCIES_URL = 'currencies-url';


    /**
     * Gets the value.
     *
     * @return string
     */
    public function getValue(): string
    {
        $settingsRepository = new SettingsRepository();

        return env($this->name, $settingsRepository->getByCode($this->value)?->value ?? '');
    }
}
