<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    /**
     * Set nama tabel
     * @var string
     */
    protected $table = 'ruang';

    /**
     * Menset agar model tidak menghiraukan pengisian created_at dan updated_at
     * karena tabel pada yang digunakan model ini tidak memiliki kolom tersebut.
     * @var boolean
     */
    public $timestamps = false;

    public function praktikkum()
    {
        return $this->hasMany('App\Praktikkum', 'id');
    }
}
