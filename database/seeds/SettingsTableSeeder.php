<?php

use Illuminate\Database\Seeder;
use App\Settings;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name'=>' LARAVEL BLOG ',
            'address'=>'Egypt , Cairo',
            'phone'=>'01555307734',
            'email'=>'mosae35@yahoo.com',
        ]);
    }
}
