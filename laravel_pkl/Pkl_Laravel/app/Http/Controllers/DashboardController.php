<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalJurusan = Jurusan::count();

        $lakiLaki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

        $kelasData = Kelas::withCount('siswas')->orderBy('siswas_count', 'desc')->get();
        $jurusanData = Jurusan::withCount('siswas')->orderBy('siswas_count', 'desc')->get();

        return view('dashboard', compact(
            'totalSiswa',
            'totalKelas',
            'totalJurusan',
            'lakiLaki',
            'perempuan',
            'kelasData',
            'jurusanData'
        ));
    }

    public function exportPdf()
    {
        $data = Siswa::with(['kelasRelation', 'jurusanRelation'])->latest()->get();

        $pdf = Pdf::loadView('exports.siswa', compact('data'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-siswa.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'laporan-siswa.xlsx');
    }
}
