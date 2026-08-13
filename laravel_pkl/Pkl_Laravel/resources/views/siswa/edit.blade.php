<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        .container {
            max-width: 850px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
            font-size: 14px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            font-family: Arial, sans-serif;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .btn-back {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-update {
            background: #2563eb;
            color: white;
        }

        .btn-update:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fef2f2;
            color: #dc2626;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .container {
                margin: 25px auto;
            }

            .card {
                padding: 20px;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .actions {
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Data Siswa</h1>
        <p>Perbarui informasi data siswa.</p>
    </div>


    <div class="card">

        @if ($errors->any())

            <div class="error">

                <strong>Data belum bisa diperbarui.</strong>

                <ul style="margin-top: 8px; padding-left: 20px;">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('siswa.update', $siswa->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $siswa->nama) }}"
                    placeholder="Masukkan nama siswa"
                    required
                >

            </div>


            <div class="row">

                <div class="form-group">

                    <label for="nis">
                        NIS
                    </label>

                    <input
                        type="text"
                        id="nis"
                        name="nis"
                        value="{{ old('nis', $siswa->nis) }}"
                        placeholder="Masukkan NIS"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="kelas_id">
                        Kelas
                    </label>

                    <select
                        id="kelas_id"
                        name="kelas_id"
                        required
                    >
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $item)
                            <option value="{{ $item->id }}" {{ old('kelas_id', $siswa->kelas_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>


            <div class="form-group">

                <label for="jurusan_id">
                    Jurusan
                </label>

                <select
                    id="jurusan_id"
                    name="jurusan_id"
                    required
                >
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusan as $item)
                        <option value="{{ $item->id }}" {{ old('jurusan_id', $siswa->jurusan_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>

            </div>


            <div class="form-group">

                <label for="jenis_kelamin">
                    Jenis Kelamin
                </label>

                <select
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    required
                >
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>

            </div>


            <div class="form-group">

                <label for="alamat">
                    Alamat
                </label>

                <textarea
                    id="alamat"
                    name="alamat"
                    placeholder="Masukkan alamat siswa"
                    required
                >{{ old('alamat', $siswa->alamat) }}</textarea>

            </div>


            <div class="actions">

                <a
                    href="{{ route('siswa.index') }}"
                    class="btn btn-back"
                >
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="btn btn-update"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>