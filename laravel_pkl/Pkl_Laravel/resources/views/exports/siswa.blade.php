<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f3f4f6; }
        h2 { margin-bottom: 0; }
    </style>
</head>
<body>
    <h2>Laporan Data Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
                <tr>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->kelasRelation?->nama ?? $siswa->kelas ?? '-' }}</td>
                    <td>{{ $siswa->jurusanRelation?->nama ?? $siswa->jurusan ?? '-' }}</td>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
