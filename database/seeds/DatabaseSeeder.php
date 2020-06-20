<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Minh Hòa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(123456),
        ]);

        DB::table('payments')->insert([
            ['name'  => 'Thanh toán sau khi nhận hàng'],
            ['name'  => 'Thanh toán online'],
        ]);
    }
}
