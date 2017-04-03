<?php

namespace App\Http\Controllers\Dosen;

use App\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePicture extends Controller
{
    public function __construct()
    {
        $this->middleware('dosen');
    }

    protected $guard = 'dosen';

    public function edit()
    {
        return view('dosen.picture');
    }

    public function update(Request $request)
    {
        $request->only('gambar_profile');
        $validation = $this->validate($request, [
            'gambar_profile' => 'required|file|image|max:5120',
        ]);

        $NIP = $FileName = Auth::guard($this->guard)->user()->nip;
        $FileExtension = $request->gambar_profile->getClientOriginalExtension();
        $path = public_path('images/profile/');
        $request->gambar_profile->move($path, $FileName . '.' . $FileExtension);

        $mahasiswa = Dosen::find($NIP);
        $mahasiswa->gambar_profile = $FileName . '.' . $FileExtension;
        $mahasiswa->save();

        return redirect()->route('dosen.home');
    }
}
