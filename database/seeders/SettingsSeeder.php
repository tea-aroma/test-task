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
        SettingsModel::query()->updateOrCreate([ 'id' => 1 ], [ 'key' => 'widget-autoupdate-interval', 'value' => '5000', 'description' => 'Autoupdate interval (ms).' ]);

        SettingsModel::query()->updateOrCreate([ 'id' => 2 ], [ 'key' => 'cron-autoupdate-interval', 'value' => '0 * * * *', 'description' => 'Cron autoupdate interval.' ]);
    }
}
