<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'name'=>'小学校（易）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'小学校（標準）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'小学校（難）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'中学校（易）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'中学校（標準）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'中学校（難）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'高校（易）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'高校（標準）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'高校（難）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'大学・一般（易）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'大学・一般（標準）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
        DB::table('levels')->insert([
            'name'=>'大学・一般（難）', 
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
    }
}
