<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    /**
     * Set nama tabel
     * @var string
     */
    protected $table = 'nilai';

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
        'nim', 'id_praktikkum', 'pre_test', 'post_test', 'laporan', 'perilaku',
    ];
}
