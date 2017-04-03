<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Nilai;
use App\Praktikkum;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['mahasiswa','asisten']);

        $this->middleware('ValidAsisten')->except('index');
    }

    public function index()
    {
        $mahasiswa = auth()->guard('mahasiswa')->user();

        return view('asisten.index')->with('mahasiswa', $mahasiswa);
    }

    public function show($id)
    {
        $praktikkum = Praktikkum::find($id);
        return view('asisten.show')->with('praktikkum', $praktikkum);
    }

    public function edit($id, $nim)
    {
        $praktikkum = Praktikkum::find($id);
        $mahasiswa = Mahasiswa::find($nim);
        $nilai = Nilai::where('nim', $nim)
            ->where('id_praktikkum', $id)
            ->first();
        return view('asisten.upload')->withPraktikkum($praktikkum)->withMahasiswa($mahasiswa)->withNilai($nilai);
    }

    public function update(Request $req, $id, $nim)
    {
        $this->validate($req, [
            'pre_test' => 'required|numeric|min:0|max:100',
            'post_test' => 'required|numeric|min:0|max:100',
            'perilaku' => 'required|numeric|min:0|max:100',
            'laporan' => 'required|numeric|min:0|max:100',
        ]);

        $nilai = Nilai::where('nim', $nim)
            ->where('id_praktikkum', $id)
            ->first();

        if (count($nilai) > 0) {

            $nilai->pre_test = $req->pre_test;
            $nilai->post_test = $req->post_test;
            $nilai->perilaku = $req->perilaku;
            $nilai->laporan = $req->laporan;

            $nilai->save();

        } else {

            Nilai::create([
                'nim' => $nim,
                'id_praktikkum' => $id,
                'pre_test' => $req->pre_test,
                'post_test' => $req->post_test,
                'laporan' => $req->laporan,
                'perilaku' => $req->perilaku,
            ]);

        }

        return redirect()->route('asisten.show', $id);
    }
}
