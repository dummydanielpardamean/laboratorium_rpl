<?php

use App\Praktikkum;
use Illuminate\Database\Seeder;

class PraktikkumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('praktikkum')->truncate();
        // Praktikkum::create([
        //     'judul' => 'Ini Merupakan bagian dari judul praktikkum',
        //     'keterangan' => 'Ini merupakan keterangan dari praktikkum',
        //     'program_studi' => 'E1',
        //     'angkatan' => '2015',
        //     'id_ruang' => '1',
        //     'nip' => 'DOSE1',
        //     'tanggal_waktu_mulai_praktikkum' => '2016-12-01 09:00:00',
        //     'tanggal_waktu_akhir_praktikkum' => '2016-12-01 12:00:00',
        // ]);
        // Praktikkum::create([
        //     'judul' => 'Ini Merupakan bagian dari judul praktikkum',
        //     'keterangan' => 'Ini merupakan keterangan dari praktikkum',
        //     'program_studi' => 'E1',
        //     'angkatan' => '2015',
        //     'id_ruang' => '1',
        //     'nip' => 'DOSE1',
        //     'tanggal_waktu_mulai_praktikkum' => '2016-12-01 12:00:00',
        //     'tanggal_waktu_akhir_praktikkum' => '2016-12-01 15:00:00',
        // ]);
    }
}
