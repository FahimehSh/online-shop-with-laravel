<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'first_name' => 'Fahimeh',
                'last_name' => 'Shirdel',
                'discount_id' => null,
                'email' => 'shirdel.fahimeh@gmail.com',
                'password' => bcrypt('123456789'),
                'user_IP' => '127.0.0.1',
                'is_admin' => '1',
                'registered_at' => date('Y-m-d H:i:s'),
                'last_login' => date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'Zahra',
                'last_name' => 'Mahdavi',
                'discount_id' => '1',
                'email' => 'zahraMahdavi@gmail.com',
                'password' => bcrypt('123456789'),
                'user_IP' => '127.0.0.1',
                'is_admin' => '0',
                'registered_at' => date('Y-m-d H:i:s'),
                'last_login' => date('Y-m-d H:i:s'),
            ],
            [
                'first_name' => 'Sina',
                'last_name' => 'Hoseine',
                'discount_id' => '2',
                'email' => 'sinahsn@yahoo.com',
                'password' => bcrypt('123456789'),
                'user_IP' => '127.0.0.1',
                'is_admin' => '0',
                'registered_at' => date('Y-m-d H:i:s'),
                'last_login' => date('Y-m-d H:i:s'),
            ]

        ]);
    }
}
