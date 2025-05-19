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
        SettingsModel::query()->updateOrCreate([ 'id' => 1 ], [ 'key' => 'widget-autoupdate-interval', 'value' => '5000', 'description' => 'Autoupdate interval (milliseconds).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 2 ], [ 'key' => 'cron-autoupdate-interval', 'value' => '0 * * * *', 'description' => 'Cron autoupdate interval.' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 3 ], [ 'key' => 'cache-timeout', 'value' => '3600', 'description' => 'Cache timeout (seconds).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 4 ], [ 'key' => 'currencies-url', 'value' => '', 'description' => 'Default in environment.' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 5 ], [ 'key' => 'widget-columns', 'value' => '5', 'description' => 'Count of displayed columns.' ]);
    }
}
