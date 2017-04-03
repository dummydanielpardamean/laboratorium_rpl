<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dosen;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['dosen', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::where('hak_akses', 'dosen')->paginate(20);
        return view('dosen.admin.dosen.index')->with('dosens', $dosens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.admin.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required|alpha_num|max:10|unique:dosen',
            'nama_lengkap' => 'required|max:60',
            'password' => 'required|min:4|confirmed',
        ]);

        Dosen::create([
            'nip' => strtoupper($request->nip),
            'nama_lengkap' => $request->nama_lengkap,
            'password' => bcrypt($request->password),
            'hak_akses' => 'dosen'
        ]);

        return redirect()->route('admin.dosen.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $nip
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $dosen = Dosen::find($nip);

        return view('dosen.admin.dosen.edit')->with('dosen', $dosen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $this->validate($request, [
            'new_password' => 'required',
            'new_password_confirmation' => 'required'
        ]);

        $dosen = Dosen::find($nip);

        $dosen->password = bcrypt($request->new_password);

        $dosen->save();

        return redirect()->route('admin.dosen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        Dosen::find($nip)->delete();

        return redirect()->route('admin.dosen.index');
    }
}
