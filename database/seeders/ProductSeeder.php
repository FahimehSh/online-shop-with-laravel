<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'brand_id' => 1,
                'discount_id' => 1,
                'title' => 'کالای یک',
                'meta_title' => 'کالای اول',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-یک',
                'price' => 350000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 2,
                'discount_id' => null,
                'title' => 'کالای دو',
                'meta_title' => 'کالای دوم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-دو',
                'price' => 800000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 3,
                'discount_id' => null,
                'title' => 'کالای سه',
                'meta_title' => 'کالای سوم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-سه',
                'price' => 570000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 4,
                'discount_id' => 1,
                'title' => 'کالای چهار',
                'meta_title' => 'کالای چهارم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-چهار',
                'price' => 210000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 5,
                'discount_id' => 2,
                'title' => 'کالای پنج',
                'meta_title' => 'کالای پنجم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-پنج',
                'price' => 5400000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 1,
                'discount_id' => 1,
                'title' => 'کالای شش',
                'meta_title' => 'کالای ششم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-شش',
                'price' => 980000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 2,
                'discount_id' => null,
                'title' => 'کالای هفت',
                'meta_title' => 'کالای هفتم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-هفت',
                'price' => 150000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 3,
                'discount_id' => null,
                'title' => 'کالای هشت',
                'meta_title' => 'کالای هشتم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-هشت',
                'price' => 230000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],[
                'brand_id' => 4,
                'discount_id' => 1,
                'title' => 'کالای نه',
                'meta_title' => 'کالای نهم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-نه',
                'price' => 150000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 5,
                'discount_id' => null,
                'title' => 'کالای ده',
                'meta_title' => 'کالای دهم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-ده',
                'price' => 230000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
            [
                'brand_id' => 1,
                'discount_id' => 2,
                'title' => 'کالای یازده',
                'meta_title' => 'کالای یازدهم',
                'introduction' => 'این کالا ساخت کشور ایران است.',
                'slug' => 'کالای-یازده',
                'price' => 178000,
                'quantity' => 25,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ],
        ]);
    }
}
