<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePicture extends Controller
{

    protected $guard = 'mahasiswa';

    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function edit()
    {
        return view('mahasiswa.picture');
    }

    public function update(Request $request)
    {
        $request->only('gambar_profile');
        $validation = $this->validate($request, [
            'gambar_profile' => 'required|file|image|max:5120',
        ]);

        $NIM = $FileName = Auth::guard($this->guard)->user()->nim;
        $FileExtension = $request->gambar_profile->getClientOriginalExtension();
        $path = public_path('images/profile/');
        $request->gambar_profile->move($path, $FileName . '.' . $FileExtension);

        $mahasiswa = Mahasiswa::find($NIM);
        $mahasiswa->gambar_profile = $FileName . '.' . $FileExtension;
        $mahasiswa->save();

        return redirect()->route('mahasiswa');
    }
}
