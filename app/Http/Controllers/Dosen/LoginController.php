<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('dosen', ['except' => 'login']);
    }

    protected $guard = 'dosen';

    public function username()
    {
        return 'nip';
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
        ]);

        $request = $request->only('nip', 'password');

        if (Auth::guard($this->guard)->attempt($request)) {
            return redirect()->route('dosen.home');
        }
        $errors = "NIP dan password yang dimasukkan tidak cocok";
        return back()->withErrors($errors)->withInput();
    }

    public function logout()
    {
        Auth::guard($this->guard)->logout();

        return redirect()->route('index');
    }
}
