<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::with(['kelasRelation', 'jurusanRelation'])
            ->select('nis', 'nama', 'jenis_kelamin', 'kelas', 'jurusan', 'alamat')
            ->get()
            ->map(function ($siswa) {
                return [
                    'nis' => $siswa->nis,
                    'nama' => $siswa->nama,
                    'jenis_kelamin' => $siswa->jenis_kelamin,
                    'kelas' => $siswa->kelasRelation?->nama ?? $siswa->kelas,
                    'jurusan' => $siswa->jurusanRelation?->nama ?? $siswa->jurusan,
                    'alamat' => $siswa->alamat,
                ];
            });
    }

    public function headings(): array
    {
        return ['NIS', 'Nama', 'Jenis Kelamin', 'Kelas', 'Jurusan', 'Alamat'];
    }
}
