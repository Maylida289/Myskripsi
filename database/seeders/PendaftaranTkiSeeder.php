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
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Indramayu',
            'tgl_lahir' => '27 April 1994',
            'alamat' => 'Desa Sukamakmur, Indramayu Jawa Tengah',
            'agama' => 'islam',
            'pendidikan'=> 'SMA Sederajat',
            'no_tlp'=> '91087',
            ],
            [
            'nama' => 'Yohanes Situmorang',
            'jenis_kelamin' => 'Laki - Laki',
            'tempat_lahir' => 'Medan',
            'tgl_lahir' => '21 Oktober 1990',
            'alamat' => 'Jl Tuanku Imam Bonjol no 9, Medan',
            'agama' => 'kristen katolik',
            'pendidikan'=> 'SMA/SMK',
            'no_tlp' => '130657',
            ]
        ]);
    }
}
