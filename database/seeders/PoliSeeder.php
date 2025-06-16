<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poli;
use App\Models\User;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poli = [
            [
                'nama_poli' => 'Umum',
                'deskripsi' => 'Pelayanan umum untuk semua pasien',
            ],
            [
                'nama_poli' => 'Penyakit Dalam',
                'deskripsi' => 'Pelayanan untuk penyakit dalam',
            ],
            [
                'nama_poli' => 'Anak',
                'deskripsi' => 'Pelayanan untuk anak',
            ],
            [
                'nama_poli' => 'Kebidanan dan Kandungan',
                'deskripsi' => 'Pelayanan untuk ibu hamil dan melahirkan',
            ],
            [
                'nama_poli' => 'Mata',
                'deskripsi' => 'Pelayanan kesehatan mata',
            ],
            [
                'nama_poli' => 'THT',
                'deskripsi' => 'Pelayanan Telinga, Hidung, dan Tenggorokan',
            ],
            [
                'nama_poli' => 'Bedah',
                'deskripsi' => 'Pelayanan bedah umum dan spesialis',
            ],

        ];
        foreach ($poli as $item) {
            Poli::create($item);
        }
    }
}
