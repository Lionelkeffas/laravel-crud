<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>

    <h1>Tambah Data Siswa</h1>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <label>Nama</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>NIS</label><br>
        <input type="text" name="nis" required>
        <br><br>

        <label>Kelas</label><br>
        <input type="text" name="kelas" required>
        <br><br>

        <label>Jurusan</label><br>
        <input type="text" name="jurusan" required>
        <br><br>

        <label>Alamat</label><br>
        <textarea name="alamat" required></textarea>
        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('siswa.index') }}">Kembali</a>
    </form>

</body>
</html>