<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Number;

class penggunaDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penggunas')->insert([
            'id' => Str::random(10),
            'nama' => Str::random(10),
            'email' => Str::random(2) . 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => '1',
            'nomor_rekening' => Str::random(10),
            'role' => Str::random(10),
            'unit_id' => '45',
        ]);
    }
}
