<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

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
            'name'=>'管理者',
            'email'=>'tomoshangdao99@gmail.com',
            'password'=>Hash::make('Tomoya79'),
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        ]);
    }
}
