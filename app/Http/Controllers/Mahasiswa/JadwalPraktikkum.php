<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Praktikkum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPraktikkum extends Controller
{
    protected $guard = 'mahasiswa';

    public function __construct()
    {
        $this->middleware('mahasiswa', ['except' => ['getRegister', 'getLogin']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nim = Auth::guard($this->guard)->user()->nim;
        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswa.praktikkum.index')->withMahasiswa($Mahasiswa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $praktikkum = Praktikkum::find($id);

        return view('mahasiswa.praktikkum.show')->withPraktikkum($praktikkum);
    }
}
