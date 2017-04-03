<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{

    /**
     * Set nama tabel
     * @var string
     */
    protected $table = 'mahasiswa';

    /**
     * Mengatur guard untuk Authentication
     * @var string
     */
    protected $guard = "mahasiswa";

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nim';

    /**
     * Override pengaturan increment dari model
     * @var boolean
     */
    public $incrementing = false;

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
        'nim', 'nama_lengkap', 'password', 'angkatan', 'program_studi',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Mengatur relationship 1 to many dengan tabel program_studi
     */
    public function ProgramStudi()
    {
        return $this->belongsTo('App\ProgramStudi', 'program_studi');
    }

    public function praktikkum()
    {
        return $this->belongsToMany('App\Praktikkum', 'peserta_praktikkum', 'nim', 'id_praktikkum');
    }

    public function asAsisten()
    {
        return $this->belongsToMany('App\Praktikkum', 'asisten', 'nim', 'id_praktikkum');
    }
}
