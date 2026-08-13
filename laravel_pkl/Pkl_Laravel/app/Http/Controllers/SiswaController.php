<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with(['kelasRelation', 'jurusanRelation']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        if ($request->filled('jurusan_id')) {
            $query->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $siswas = $query->latest()->paginate(10)->withQueryString();

        $kelas = Kelas::orderBy('nama')->get();
        $jurusan = Jurusan::orderBy('nama')->get();

        // Statistik yang dibutuhkan index.blade.php
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalJurusan = Jurusan::count();

        return view('siswa.index', compact(
            'siswas',
            'kelas',
            'jurusan',
            'totalSiswa',
            'totalKelas',
            'totalJurusan'
        ));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama')->get();
        $jurusan = Jurusan::orderBy('nama')->get();

        return view('siswa.create', compact('kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
        ]);

        $kelas = Kelas::findOrFail($validated['kelas_id']);
        $jurusan = Jurusan::findOrFail($validated['jurusan_id']);

        Siswa::create([
            'nama' => $validated['nama'],
            'nis' => $validated['nis'],
            'kelas_id' => $validated['kelas_id'],
            'jurusan_id' => $validated['jurusan_id'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'kelas' => $kelas->nama,
            'jurusan' => $jurusan->nama,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        $siswa->load(['kelasRelation', 'jurusanRelation']);

        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::orderBy('nama')->get();
        $jurusan = Jurusan::orderBy('nama')->get();

        return view('siswa.edit', compact(
            'siswa',
            'kelas',
            'jurusan'
        ));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis,' . $siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
        ]);

        $kelas = Kelas::findOrFail($validated['kelas_id']);
        $jurusan = Jurusan::findOrFail($validated['jurusan_id']);

        $siswa->update([
            'nama' => $validated['nama'],
            'nis' => $validated['nis'],
            'kelas_id' => $validated['kelas_id'],
            'jurusan_id' => $validated['jurusan_id'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'kelas' => $kelas->nama,
            'jurusan' => $jurusan->nama,
        ]);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    public function exportPdf()
    {
        $data = Siswa::with(['kelasRelation', 'jurusanRelation'])
            ->latest()
            ->get();

        $pdf = Pdf::loadView('exports.siswa', compact('data'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('data-siswa.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(
            new SiswaExport,
            'data-siswa.xlsx'
        );
    }
}