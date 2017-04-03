<?php

use App\Ruang;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruang')->truncate();
        Ruang::create([
            'nama' => 'Ruang 1',
            'lokasi' => 'Lt 1',
        ]);
        Ruang::create([
            'nama' => 'Ruang 2',
            'lokasi' => 'Lt 2',
        ]);
        Ruang::create([
            'nama' => 'Ruang 3',
            'lokasi' => 'Lt 1',
        ]);
        Ruang::create([
            'nama' => 'Ruang 4',
            'lokasi' => 'Lt 1',
        ]);
        Ruang::create([
            'nama' => 'Ruang 5',
            'lokasi' => 'Lt 2',
        ]);
    }
}
