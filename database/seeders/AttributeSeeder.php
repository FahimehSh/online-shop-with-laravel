<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            [
                'product_id' => 1,
                'attribute_name' => 'رنگ',
                'attribute_value' => 'آبی',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 1,
                'attribute_name' => 'سایز',
                'attribute_value' => '20*30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 1,
                'attribute_name' => 'مدل',
                'attribute_value' => 'A3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'attribute_name' => 'رنگ',
                'attribute_value' => 'بنفش',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'attribute_name' => 'سایز',
                'attribute_value' => '50*30',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 2,
                'attribute_name' => 'مدل',
                'attribute_value' => 'J7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'attribute_name' => 'رنگ',
                'attribute_value' => 'سفید',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_id' => 3,
                'attribute_name' => 'مدل',
                'attribute_value' => 'S6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
