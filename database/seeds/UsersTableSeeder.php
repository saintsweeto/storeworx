<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'EJ Ramos',
            'email' => 'ej.ramos@installworx.co.nz',
            'password' => Hash::make('secret'),
        ]);
    }
}
