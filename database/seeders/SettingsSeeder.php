<?php

namespace Database\Seeders;

use App\Models\SettingsModel;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingsModel::query()->updateOrCreate([ 'id' => 1 ], [ 'key' => 'widget-autoupdate-interval', 'value' => '5000', 'description' => 'Widget auto-update interval (milliseconds).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 2 ], [ 'key' => 'cron-autoupdate-interval', 'value' => '0 * * * *', 'description' => 'Cron auto-update interval (CRON format).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 3 ], [ 'key' => 'cache-timeout', 'value' => '3600', 'description' => 'Cache timeout duration (in seconds).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 4 ], [ 'key' => 'currencies-url', 'value' => '', 'description' => 'API endpoint for currencies.' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 5 ], [ 'key' => 'widget-columns', 'value' => '5', 'description' => 'Number of columns shown in the widget.' ]);
    }
}
