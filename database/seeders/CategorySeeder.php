<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
           [
               'parent_id'=>null,
               'title'=>'دسته بندی اول',
               'slug'=>'دسته-بندی-اول',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],
            [
               'parent_id'=>null,
               'title'=>'دسته بندی دوم',
               'slug'=>'دسته-بندی-دوم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],[
               'parent_id'=>'1',
               'title'=>'دسته بندی سوم',
               'slug'=>'دسته-بندی-سوم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],[
               'parent_id'=>'1',
               'title'=>'دسته بندی چهارم',
               'slug'=>'دسته-بندی-چهارم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],[
               'parent_id'=>'1',
               'title'=>'دسته بندی پنجم',
               'slug'=>'دسته-بندی-پنجم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],[
               'parent_id'=>'2',
               'title'=>'دسته بندی ششم',
               'slug'=>'دسته-بندی-ششم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],[
               'parent_id'=>'2',
               'title'=>'دسته بندی هفتم',
               'slug'=>'دسته-بندی-هفتم',
               'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s'),
           ],
        ]);
    }
}
