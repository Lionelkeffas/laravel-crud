<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    protected $fillable = ['nama'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'jurusan_id');
    }
}
