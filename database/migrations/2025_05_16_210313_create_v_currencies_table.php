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
        DB::statement('create or replace view v_currencies as
            select cr.id,
            cr.currency_day_id,
            cd.date as currency_day_date,
            cr.currency_id,
            c.valute_id as currency_valute_id,
            c.num_code as currency_num_code,
            c.char_code as currency_char_code,
            c.name as currency_name,
            cr.nominal,
            cr.value,
            cr.vunit_rate,
            cr.created_at,
            cr.updated_at
            from currency_values cr
            left join laravel.currency_days cd on cd.id = cr.currency_day_id
            left join laravel.currencies c on c.id = cr.currency_id;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop view if exists v_currencies;');
    }
};
