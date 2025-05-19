<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->down();

        DB::statement('create view v_currencies as
            select cv1.id,
            cv1.currency_day_id,
            cd.date as currency_day_date,
            cv1.currency_id,
            c.valute_id as currency_valute_id,
            c.num_code as currency_num_code,
            c.char_code as currency_char_code,
            c.name as currency_name,
            cv2.nominal as yesterday_nominal,
            cv1.nominal,
            cv1.value,
            cv2.value as yesterday_value,
            cv1.vunit_rate,
            cv2.vunit_rate as yesterday_vunit_rate,
            cs.id as currency_setting_id,
            cs.is_show as currency_setting_is_show,
            cs.is_load as currency_setting_is_load,
            cv1.created_at,
            cv1.updated_at
            from currency_values cv1
            left join laravel.currency_days cd on cd.id = cv1.currency_day_id
            left join laravel.currencies c on c.id = cv1.currency_id
            left join laravel.currencies_settings cs on c.id = cs.currency_id
            left join laravel.currency_values cv2 on c.id = cv2.currency_id and date_format(cv2.created_at, \'%Y-%m-%d\') = (current_date() - interval 1 day)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop view if exists v_currencies;');
    }
};
