<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
    protected $guard = 'mahasiswa';

    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function edit()
    {
        return view('mahasiswa.password');
    }

    public function update(Request $req)
    {
        $this->validate($req, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $nim = auth()->guard($this->guard)->user()->nim;
        $hashedPassword = auth()->guard($this->guard)->user()->getAuthPassword();

        if (Hash::check($req->old_password, $hashedPassword)) {

            $dosen = Mahasiswa::find($nim);

            $dosen->password = bcrypt($req->new_password);

            $dosen->save();

            return redirect()->route('mahasiswa');
        }
    }
}
