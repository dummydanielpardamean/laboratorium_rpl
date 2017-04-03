<?php

use App\ProgramStudi;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_studi')->truncate();
        ProgramStudi::create([
            'id' => 'A0',
            'nama_program_studi' => 'Kimia Industri',
        ]);
        ProgramStudi::create([
            'id' => 'B0',
            'nama_program_studi' => 'Analisis Kimia',
        ]);
        ProgramStudi::create([
            'id' => 'C1',
            'nama_program_studi' => 'Kimia',
        ]);
        ProgramStudi::create([
            'id' => 'C2',
            'nama_program_studi' => 'Matematika',
        ]);
        ProgramStudi::create([
            'id' => 'C3',
            'nama_program_studi' => 'Fisika',
        ]);
        ProgramStudi::create([
            'id' => 'C4',
            'nama_program_studi' => 'Biologi',
        ]);
        ProgramStudi::create([
            'id' => 'D1',
            'nama_program_studi' => 'Teknik Pertambangan',
        ]);
        ProgramStudi::create([
            'id' => 'D2',
            'nama_program_studi' => 'Teknik Geologi',
        ]);
        ProgramStudi::create([
            'id' => 'D3',
            'nama_program_studi' => 'Teknik Geofisika',
        ]);
        ProgramStudi::create([
            'id' => 'E1',
            'nama_program_studi' => 'Sistem Informasi',
        ]);
        ProgramStudi::create([
            'id' => 'F1',
            'nama_program_studi' => 'Farmasi',
        ]);
    }
}
