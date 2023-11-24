<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('model_numbers')->insert([
            'model_name' => '8gdye33',
            'company_id' => '1',
        ]);
        DB::table('model_numbers')->insert([
            'model_name' => 'b57347',
            'company_id' => '2',
        ]);
        DB::table('model_numbers')->insert([
            'model_name' => 'ch6375',
            'company_id' => '2',
        ]);
        DB::table('companies')->insert([
            'name' => 'fd765375',
            'member_id' => '1',
        ]);
    }
}
