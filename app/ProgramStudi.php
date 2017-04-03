<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    /**
     * Set nama tabel
     * @var string
     */
    protected $table = 'program_studi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
     * Mengatur relationship 1 to many dengan tabel mahasiswa
     */
    public function mahasiswa()
    {
        return $this->hasMany('App/Mahasiswa', 'program_studi');
    }
}
