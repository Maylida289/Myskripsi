<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pendaftaranp3miSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendaftaran_p3mi')->insert([
            [
            'nama'=>'Ahmad Yantono',
            'sponsor'=>'PT Maju Perkasa Raya',
            ],
            [
            'nama' =>'Andini Mustikasari',
            'sponsor'=>'PT Indo Selaras Sentosa',
            ]
        ]);
    }
}

