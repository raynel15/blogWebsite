<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$JRyRsAR4JWQc2r24dDayW.sonZ8Zj49A556wyioY3sueIMowxSJG2'
        ]);
    }
}
