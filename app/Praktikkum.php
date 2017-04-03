<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktikkum extends Model
{
    /**
     * Set nama tabel
     * @var string
     */
    protected $table = 'praktikkum';

    /**
     * Menset agar model tidak menghiraukan pengisian created_at dan updated_at
     * karena tabel pada yang digunakan model ini tidak memiliki kolom tersebut.
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'keterangan', 'program_studi', 'angkatan', 'id_ruang', 'nip', 'tanggal_waktu_mulai_praktikkum', 'tanggal_waktu_akhir_praktikkum',
    ];

    public function ruang()
    {
        return $this->belongsTo('App\Ruang', 'id_ruang');
    }

    public function peserta()
    {
        return $this->belongsToMany('App\Mahasiswa', 'peserta_praktikkum', 'id_praktikkum', 'nim');
    }

    public function asisten()
    {
        return $this->belongsToMany('App\Mahasiswa', 'asisten', 'id_praktikkum', 'nim');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen', 'nip');
    }
}
