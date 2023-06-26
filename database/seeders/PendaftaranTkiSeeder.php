<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftaranTkiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendaftaran_tki')->insert([
            [
            'nama' => 'Thalita Anggraeni',
            'alamat' => 'Cikarang Seletan',
            'usia'=> 30,
            ],
            [
            'nama' => 'Aminah Cendikiawan',
            'alamat' => 'Jl Pantai Utara, Sukambumi Jawa Barat',
            'usia'=> 30,
            ]
        ]);
    }
}
