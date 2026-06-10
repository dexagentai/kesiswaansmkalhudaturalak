<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil semua seeder yang kamu buat
        $this->call([
            SiswaSeeder::class,
            AbsensiSeeder::class,
        ]);
    }
}
