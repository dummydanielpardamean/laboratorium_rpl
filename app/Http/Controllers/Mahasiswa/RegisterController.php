<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nim' => 'required|string|min:9|max:10|unique:mahasiswa',
            'nama_lengkap' => 'required|max:60',
            'password' => 'required|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $request->nim = strtoupper($request->nim);
        $request->nama_lengkap = ucwords(strtolower($request->nama_lengkap));

        $mahasiswa = new Mahasiswa;

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_lengkap = $request->nama_lengkap;
        $mahasiswa->password = bcrypt($request->password);
        $mahasiswa->angkatan = $this->getAngkatan($request->nim);
        $mahasiswa->program_studi = $this->getProgramStudi($request->nim);

        $mahasiswa->save();

        return redirect()->route('mahasiswa.login');
    }

    /**
     * Ambil Tahun Angkatan berdasarkan input NIM
     * @param  [type] $string [description]
     * @return [type]         [description]
     */
    private function getAngkatan($string)
    {
        return "20" . substr($string, 4, 2);
    }

    /**
     * Ambil kode prodi berdasarkan input NIM
     * @param  [type] $string [description]
     * @return [type]         [description]
     */
    private function getProgramStudi($string)
    {
        return substr($string, 2, 2);
    }

    public function getRegister()
    {
        return view('mahasiswa.auth.register');
    }
}
