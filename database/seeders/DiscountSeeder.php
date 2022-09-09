<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            [
                'code' => 'ADR56J',
                'amount' => '150000',
                'type'=>'fix',
                'created_at' => date('Y-m-d H:i:s'),
                'started_at' => date('2022-09-09 17:39:13'),
                'ended_at' => date('2022-09-28 17:39:13'),
            ],[
                'code' => 'ASR89J',
                'amount' => '200000',
                'type'=>'fix',
                'created_at' => date('Y-m-d H:i:s'),
                'started_at' => date('Y-m-d H:i:s'),
                'ended_at' => date('2022-09-28 17:39:13'),
            ],[
                'code' => 'JKR56J',
                'amount' => '90000',
                'type'=>'fix',
                'created_at' => date('Y-m-d H:i:s'),
                'started_at' => date('Y-m-d H:i:s'),
                'ended_at' => date('2022-09-28 17:39:13'),
            ],
        ]);
    }
}
