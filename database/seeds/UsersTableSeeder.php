<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mosa',
            'email' => 'mosa@yahoo.com',
            'password' => bcrypt('mosa12345'),
            'admin'=> 1,
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'avatar' => 'u[loades/profile_img',
        ]);

    }
}
