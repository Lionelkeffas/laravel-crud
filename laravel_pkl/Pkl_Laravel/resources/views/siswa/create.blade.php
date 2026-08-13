<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Siswa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            color: #111827;
            font-family: Arial, Helvetica, sans-serif;
        }

        .wrapper {
            max-width: 650px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.08);
        }

        h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            margin-bottom: 25px;
            color: #6b7280;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 8px 0 0 20px;
        }

        .success-box {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-save {
            border: none;
            background: #2563eb;
            color: white;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
            padding: 11px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="card">

        <h1>Tambah Data Siswa</h1>

        <div class="subtitle">
            Isi data siswa dengan lengkap.
        </div>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="error-box">
                <strong>Data belum berhasil disimpan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('siswa.store') }}" method="POST">

            @csrf

            {{-- NAMA --}}
            <div class="field">
                <label for="nama">Nama Siswa</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama siswa"
                    required
                >
            </div>

            {{-- NIS --}}
            <div class="field">
                <label for="nis">NIS</label>

                <input
                    type="text"
                    id="nis"
                    name="nis"
                    value="{{ old('nis') }}"
                    placeholder="Masukkan NIS"
                    required
                >
            </div>

            {{-- KELAS --}}
            <div class="field">
                <label for="kelas_id">Kelas</label>

                <select id="kelas_id" name="kelas_id" required>

                    <option value="">-- Pilih Kelas --</option>

                    @foreach ($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('kelas_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama }}
                        </option>

                    @endforeach

                </select>
            </div>

            {{-- JURUSAN --}}
            <div class="field">
                <label for="jurusan_id">Jurusan</label>

                <select id="jurusan_id" name="jurusan_id" required>

                    <option value="">-- Pilih Jurusan --</option>

                    @foreach ($jurusan as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('jurusan_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama }}
                        </option>

                    @endforeach

                </select>
            </div>

            {{-- JENIS KELAMIN --}}
            <div class="field">
                <label for="jenis_kelamin">Jenis Kelamin</label>

                <select
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    required
                >

                    <option value="">-- Pilih Jenis Kelamin --</option>

                    <option
                        value="Laki-laki"
                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                    >
                        Laki-laki
                    </option>

                    <option
                        value="Perempuan"
                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                    >
                        Perempuan
                    </option>

                </select>
            </div>

            {{-- ALAMAT --}}
            <div class="field">
                <label for="alamat">Alamat</label>

                <textarea
                    id="alamat"
                    name="alamat"
                    placeholder="Masukkan alamat siswa"
                    required
                >{{ old('alamat') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="actions">

                <button
                    type="submit"
                    class="btn-save"
                >
                    Simpan Data
                </button>

                <a
                    href="{{ route('siswa.index') }}"
                    class="btn-back"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>