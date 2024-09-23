<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class userUnitDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert into the units table and capture the ID
        $unitId = Str::uuid()->toString();  // Generate a UUID for the unit
        $roleId = Str::uuid()->toString();
        
        DB::table('units')->insert([
            'id' => $unitId,
            'nama' => 'BKA',
            'description' => Str::random(10),
            'status' => 'Aktif',
        ]);

        // Insert into the penggunas table using the same unit_id
        DB::table('penggunas')->insert([
            'id' => Str::uuid()->toString(),
            'nama' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => '1',
            'nomor_rekening' => Str::random(10),
            'unit_id' => $unitId,  // Use the ID from the previous insert
        ]);

        DB::table('roles')->insert([
            'uuid' => Str::uuid()->toString(),
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);
    }
}
