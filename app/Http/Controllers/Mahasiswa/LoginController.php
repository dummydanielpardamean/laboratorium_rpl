<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Setting Guard - Modification
     * @var string
     */
    protected $guard = 'mahasiswa';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('mahasiswa')->only('logout');
    }

    /**
     * Override username in Illuminate file
     * @return [type] [description]
     */
    public function username()
    {
        return 'nim';
    }

    /**
     * Menampilkan form login
     * @return [type] [description]
     */
    public function getLogin()
    {
        return view('mahasiswa.auth.login');
    }

    /**
     * Memproses request login
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'password' => 'required',
        ]);
        $request = $request->only('nim', 'password');
        if (Auth::guard($this->guard)->attempt($request)) {
            return redirect()->route('mahasiswa');
        }
        $errors = "NIM dan password yang dimasukkan tidak cocok";
        return back()->withInput()->withErrors($errors);
    }

    /**
     * Function to logout.
     * @return [type] [description]
     */
    public function logout()
    {
        Auth::guard($this->guard)->logout();

        return redirect()->route('index');
    }
}
