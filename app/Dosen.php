<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    /**
     * Set nama tabel dan mengubah nama default yang diberikan laravel
     * @var string
     */
    protected $table = 'dosen';

    /**
     * Mengatur guard untuk Authentication
     * @var string
     */
    protected $guard = "dosen";

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'nip';

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
        'nip', 'nama_lengkap', 'password', 'gambar_profile', 'hak_akses',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function praktikkum()
    {
        return $this->hasMany('App\Praktikkum', 'nip');
    }
}
