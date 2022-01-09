<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provinsi::create([
            'nama' => 'Jawa Barat'
        ]);

        Kota::create([
            'provinsi_id' => 1,
            'nama' => 'Subang'
        ]);

        Kecamatan::create([
            'kota_id' => 1,
            'nama' => 'Subang'
        ]);
    }
}
