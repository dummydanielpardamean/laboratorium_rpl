<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Praktikkum;
use App\Nilai;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    protected $guard = 'mahasiswa';

    public function __construct()
    {
        $this->middleware('mahasiswa', ['except' => ['getRegister', 'getLogin']]);
    }

    public function getHome()
    {
        return view('mahasiswa.home');
    }

    public function nilai($id, $nim)
    {
        $praktikkum = Praktikkum::find($id);
        $mahasiswa = Mahasiswa::find($nim);
        $nilai = Nilai::where('nim', $nim)
            ->where('id_praktikkum', $id)
            ->first();

        return view('mahasiswa.nilai')->withPraktikkum($praktikkum)->withMahasiswa($mahasiswa)->withNilai($nilai);
    }
}
