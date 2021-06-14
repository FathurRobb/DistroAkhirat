<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            [
                'username' => 'admin',
                'level' => 'admin',
                'password' => bcrypt('admin'),
                'nik_karyawan' => '32647298702479',
                'remember_token' => Str::random(60),
            ],
            [
                'username' => 'kasir',
                'level' => 'kasir',
                'password' => bcrypt('kasir'),
                'nik_karyawan' => '32567428928948',
                'remember_token' => Str::random(60),
            ],
            [
                'username' => 'gudang',
                'level' => 'gudang',
                'password' => bcrypt('gudang'),
                'nik_karyawan' => '32478264892702',
                'remember_token' => Str::random(60),
            ],
        ]);
    }
}
