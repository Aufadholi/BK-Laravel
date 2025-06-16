<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poli::insert([
            ['nama_poli' => 'Poli Umum', 'lokasi' => 'Lantai 1'],
            ['nama_poli' => 'Poli Gigi', 'lokasi' => 'Lantai 2'],
            ['nama_poli' => 'Poli Anak', 'lokasi' => 'Lantai 1'],
        ]);
    }
}
