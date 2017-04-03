<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Nilai;
use App\Praktikkum;
use App\ProgramStudi;
use App\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPraktikkum extends Controller
{

    public function __construct()
    {
        $this->middleware('dosen');
        $this->middleware('ValidDosen')->only('show');
    }

    /**
     * Set guard
     * @var string
     */
    protected $guard = 'dosen';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nip = Auth::guard($this->guard)->user()->nip;
        $praktikkum = Praktikkum::where('nip', $nip)->get();
        return view('dosen.praktikkum.index')->with('praktikkums', $praktikkum);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ProgramStudis = ProgramStudi::all();
        $Ruangs = Ruang::all();
        return view('dosen.praktikkum.create')->with('ProgramStudis', $ProgramStudis)->withRuangs($Ruangs);
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
            'judul'         => 'required|min:5|max:60',
            'keterangan'    => 'required|min:5',
            'program_studi' => 'required|alpha_num',
            'angkatan'      => 'required|numeric',
            'asisten'       => 'required',
            'tanggal'       => 'required|alpha_dash',
            'waktu'         => 'required',
            'ruang'         => 'required|numeric',
        ]);

        $tanggal_waktu_mulai_praktikkum = $this->getTanggalWaktu($request->tanggal, $request->waktu);
        $tanggal_waktu_mulai_praktikkum_unix = strtotime($tanggal_waktu_mulai_praktikkum);

        $lama_praktikkum = (3 * 60) * 60;

        $tanggal_waktu_akhir_praktikkum_unix = $tanggal_waktu_mulai_praktikkum_unix + $lama_praktikkum;
        $tanggal_waktu_akhir_praktikkum = date("Y-m-d H:i:s", $tanggal_waktu_akhir_praktikkum_unix);

        $program_studi = $request->program_studi;
        $angkatan      = $request->angkatan;

        $asisten       = $request->asisten;

        // Cek apakah ada praktikkum yang menggunakan ruangan yang sama dimulai pada waktu yang diberikan
        $praktikkum = Praktikkum::where('id_ruang', $request->ruang)
            ->where('tanggal_waktu_mulai_praktikkum', '<=', $tanggal_waktu_mulai_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {
            $errors = "Ruang $request->ruang pada jam $tanggal_waktu_mulai_praktikkum sudah mengadakan praktikkum";
            return redirect()->back()->withInput()->withErrors($errors);
        }

        // Cek apakah ada praktikkum yang menggunakan ruangan yang sama dimulai pada waktu yang diberikan
        $praktikkum = Praktikkum::where('id_ruang', $request->ruang)
            ->where('tanggal_waktu_mulai_praktikkum', '<', $tanggal_waktu_akhir_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {
            $errors = "Ruang $request->ruang pada jam $tanggal_waktu_mulai_praktikkum sudah mengadakan praktikkum";
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $praktikkum = Praktikkum::where('program_studi', $program_studi)
            ->where('angkatan', $angkatan)
            ->where('tanggal_waktu_mulai_praktikkum', '<=', $tanggal_waktu_mulai_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {

            $program_studi = ProgramStudi::where('id', $program_studi)->first()->nama_program_studi;

            $errors = "Program Studi $program_studi pada jam $tanggal_waktu_mulai_praktikkum mengikuti praktikkum";
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $praktikkum = Praktikkum::where('program_studi', $program_studi)
            ->where('angkatan', $angkatan)
            ->where('tanggal_waktu_mulai_praktikkum', '<', $tanggal_waktu_akhir_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();


        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {

            $program_studi = ProgramStudi::where('id', $program_studi)->first()->nama_program_studi;

            $errors = "Program Studi $program_studi pada jam $tanggal_waktu_mulai_praktikkum mengikuti praktikkum";
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $request = [
            'judul'                          => $request->judul,
            'keterangan'                     => $request->keterangan,
            'program_studi'                  => $program_studi,
            'angkatan'                       => $angkatan,
            'id_ruang'                       => $request->ruang,
            'nip'                            => Auth::guard($this->guard)->user()->nip,
            'tanggal_waktu_mulai_praktikkum' => $tanggal_waktu_mulai_praktikkum,
            'tanggal_waktu_akhir_praktikkum' => $tanggal_waktu_akhir_praktikkum,
        ];

        $mahasiswa = Mahasiswa::where('program_studi', $program_studi)
            ->where('angkatan', $angkatan)
            ->get();

        $praktikkum = Praktikkum::create($request);
        $praktikkum->peserta()->syncWithoutDetaching($mahasiswa);
        $praktikkum->asisten()->syncWithoutDetaching($asisten);

        return redirect()->route('dosen.praktikkum.index');
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

        return view('dosen.praktikkum.show')->withPraktikkum($praktikkum);
    }

    public function nilai($id, $nim)
    {
        $praktikkum = Praktikkum::find($id);
        $mahasiswa = Mahasiswa::find($nim);
        $nilai = Nilai::where('nim', $nim)
            ->where('id_praktikkum', $id)
            ->first();
        return view('dosen.nilai')
            ->withPraktikkum($praktikkum)
            ->withMahasiswa($mahasiswa)
            ->withNilai($nilai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('peserta_praktikkum')->where('id_praktikkum', $id)->delete();
        \DB::table('asisten')->where('id_praktikkum', $id)->delete();
        Praktikkum::find($id)->delete();

        return redirect()->route('dosen.praktikkum.index');

    }

    /**
     * Fungsi untuk menggabungkan tanggal dan waktu yang didapat dari form
     * @param  [type] $tanggal [description]
     * @param  [type] $waktu   [description]
     * @return [type]          [description]
     */
    public function getTanggalWaktu($tanggal, $waktu)
    {
        return $tanggal . ' ' . $waktu . ':00';
    }

    /**
     * Fungsi untuk mengecek ruang yang tersedia
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function check(Request $request)
    {
        $tanggal_waktu_mulai_praktikkum = $this->getTanggalWaktu($request->tanggal, $request->waktu);
        $tanggal_waktu_mulai_praktikkum_unix = strtotime($tanggal_waktu_mulai_praktikkum);

        $lama_praktikkum = (3 * 60) * 60;

        $tanggal_waktu_akhir_praktikkum_unix = $tanggal_waktu_mulai_praktikkum_unix + $lama_praktikkum;
        $tanggal_waktu_akhir_praktikkum = date("Y-m-d H:i:s", $tanggal_waktu_akhir_praktikkum_unix);

        $program_studi = $request->program_studi;
        $angkatan = $request->angkatan;

        // Cek apakah ada praktikkum yang menggunakan ruangan yang sama dimulai pada waktu yang diberikan
        $praktikkum = Praktikkum::where('id_ruang', $request->ruang)
            ->where('tanggal_waktu_mulai_praktikkum', '<=', $tanggal_waktu_mulai_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {
            return [
                'result' => false,
                'messages' => "Ruang $request->ruang pada jam $tanggal_waktu_mulai_praktikkum sudah mengadakan praktikkum",
            ];
        }

        // Cek apakah ada praktikkum yang menggunakan ruangan yang sama dimulai pada waktu yang diberikan
        $praktikkum = Praktikkum::where('id_ruang', $request->ruang)
            ->where('tanggal_waktu_mulai_praktikkum', '<', $tanggal_waktu_akhir_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {
            return [
                'result' => false,
                'messages' => "Ruang $request->ruang pada jam $tanggal_waktu_mulai_praktikkum sudah mengadakan praktikkum",
            ];
        }

        $praktikkum = Praktikkum::where('program_studi', $program_studi)
            ->where('angkatan', $angkatan)
            ->where('tanggal_waktu_mulai_praktikkum', '<=', $tanggal_waktu_mulai_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {

            $program_studi = ProgramStudi::where('id', $program_studi)->first()->nama_program_studi;

            return [
                'result' => false,
                'messages' => "Program Studi $program_studi pada jam $tanggal_waktu_mulai_praktikkum mengikuti praktikkum",
            ];
        }

        $praktikkum = Praktikkum::where('program_studi', $program_studi)
            ->where('angkatan', $angkatan)
            ->where('tanggal_waktu_mulai_praktikkum', '<', $tanggal_waktu_akhir_praktikkum)
            ->where('tanggal_waktu_akhir_praktikkum', '>', $tanggal_waktu_mulai_praktikkum)
            ->first();

        // Jika ada praktikkum yang cocok dengan kondisi SQL.
        if (count($praktikkum) > 0) {

            $program_studi = ProgramStudi::where('id', $program_studi)->first()->nama_program_studi;

            return [
                'result' => false,
                'messages' => "Program Studi $program_studi pada jam $tanggal_waktu_mulai_praktikkum mengikuti praktikkum",
            ];
        }

        $asisten = Mahasiswa::where('angkatan', '<', $angkatan)
            ->where('program_studi', $program_studi)
            ->get();

        return [
            'result' => true,
            'asisten' => $asisten,
        ];
    }
}
