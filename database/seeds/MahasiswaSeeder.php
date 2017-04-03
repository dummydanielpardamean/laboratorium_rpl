<?php

use Illuminate\Database\Seeder;
use App\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->truncate();
        Mahasiswa::create([
            'nim' => 'F1E115001',
            'nama_lengkap' => 'NOFITA RAHAYU NINGSIH',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115001.JPG'
        ]);
        Mahasiswa::create([
            'nim' => 'F1E115002',
            'nama_lengkap' => 'MALA RHISKIANI PUTRI',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115002.JPG'
        ]);
        Mahasiswa::create([
            'nim' => 'F1E115003',
            'nama_lengkap' => 'MUHAMMAD SYARIFUDDIN',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115003.JPG'
        ]);
        Mahasiswa::create([
            'nim' => 'F1E115004',
            'nama_lengkap' => 'RAHMAD ARIF IRWANSYAH',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115004.JPG'
        ]);
        Mahasiswa::create([
            'nim' => 'F1E115005',
            'nama_lengkap' => 'YOGA DWI SANTOSO',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115005.JPG'
        ]);
 		Mahasiswa::create([
            'nim' => 'F1E115006',
            'nama_lengkap' => 'JZALMAN',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115006.JPG'
        ]);
 		Mahasiswa::create([
            'nim' => 'F1E115007',
            'nama_lengkap' => 'KRISNA BAYU PRATAMA',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115007.JPG'
        ]);
 		Mahasiswa::create([
            'nim' => 'F1E115008',
            'nama_lengkap' => 'RAHMAD RIDO',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115008.JPG'
        ]);
 		Mahasiswa::create([
            'nim' => 'F1E115009',
            'nama_lengkap' => 'MIFTAHUL HUDA',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115009.JPG'
        ]);
		 Mahasiswa::create([
            'nim' => 'F1E115010',
            'nama_lengkap' => 'ADAM RAHMAT FITRIYANTO',
            'password' => bcrypt('login'),
            'angkatan' => '2015',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E115010.JPG'
        ]);
		 Mahasiswa::create([
            'nim' => 'F1E114002',
            'nama_lengkap' => 'NOVITRIANI',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114002.JPG'
        ]);
		 Mahasiswa::create([
            'nim' => 'F1E114003',
            'nama_lengkap' => 'BUKHORI',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114003.JPG'
        ]);
         Mahasiswa::create([
            'nim' => 'F1E114004',
            'nama_lengkap' => 'AFRIANA',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114004.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114005',
            'nama_lengkap' => 'RAHMAT DIKA ANGGORO',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114005.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114006',
            'nama_lengkap' => 'FADLI FATHUL MUBAROK',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114006.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114008',
            'nama_lengkap' => 'TISYA QINTARI FADILLAH',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114008.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114009',
            'nama_lengkap' => 'PRATAMA AZANI AKBAR S',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114009.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114010',
            'nama_lengkap' => 'PADLI',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114010.JPG'
        ]); 
         Mahasiswa::create([
            'nim' => 'F1E114011',
            'nama_lengkap' => 'RIZKI RIDHA UTAMI',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114011.JPG'
        ]);
        Mahasiswa::create([
            'nim' => 'F1E114012',
            'nama_lengkap' => 'AIDA ZURAINI',
            'password' => bcrypt('login'),
            'angkatan' => '2014',
            'program_studi' => 'E1',
            'gambar_profile' => 'F1E114012.JPG'
        ]);
    }
}
