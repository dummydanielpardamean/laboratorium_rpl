<?php

namespace App\Http\Controllers\Dosen;

use App\Dosen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
    protected $guard = 'dosen';

    public function __construct()
    {
        $this->middleware('dosen');
    }

    public function edit()
    {
        return view('dosen.password');
    }

    public function update(Request $req)
    {
        $this->validate($req, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $nip = auth()->guard($this->guard)->user()->nip;
        $hashedPassword = auth()->guard($this->guard)->user()->getAuthPassword();

        if (Hash::check($req->old_password, $hashedPassword)) {

            $dosen = Dosen::find($nip);

            $dosen->password = bcrypt($req->new_password);

            $dosen->save();
            return redirect()->route('dosen.home');
        }
    }
}
