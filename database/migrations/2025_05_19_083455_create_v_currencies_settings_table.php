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

        DB::statement('create view v_currencies_settings as
        select cs.id,
        cs.currency_id,
        c.valute_id as currency_valute_id,
        c.num_code as currency_num_code,
        c.char_code as currency_char_code,
        c.name as currency_name,
        cs.is_load,
        cs.is_show,
        cs.description,
        cs.created_at,
        cs.updated_at
        from currencies_settings cs
        left join laravel.currencies c on c.id = cs.currency_id;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('drop view if exists v_currencies_settings;');
    }
};
