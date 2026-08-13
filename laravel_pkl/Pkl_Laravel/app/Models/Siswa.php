<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'jurusan',
        'jenis_kelamin',
        'alamat',
        'kelas_id',
        'jurusan_id',
    ];

    public function kelasRelation()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function jurusanRelation()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}