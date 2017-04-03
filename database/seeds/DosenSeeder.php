<?php

use App\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen')->truncate();
        Dosen::create([
            'nip' => 'DOSE1',
            'nama_lengkap' => 'Joko',
            'password' => bcrypt('login'),
            'hak_akses' => 'dosen',
            'gambar_profile' => 'def.png',
        ]);
        Dosen::create([
            'nip' => 'ADMINA1',
            'nama_lengkap' => 'Admin name',
            'password' => bcrypt('login'),
            'hak_akses' => 'admin',
            'gambar_profile' => 'def.png',
        ]);
        Dosen::create([
            'nip' => 'DOSB1',
            'nama_lengkap' => 'Bram',
            'password' => bcrypt('login'),
            'hak_akses' => 'dosen',
            'gambar_profile' => 'def.png',
        ]);
    }
}
