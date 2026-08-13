<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa</title>

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

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #111827;
            padding: 25px 18px;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 40px;
            padding-left: 10px;
        }

        .logo span {
            color: #3b82f6;
        }

        .menu-title {
            font-size: 11px;
            color: #6b7280;
            margin: 0 10px 10px;
            text-transform: uppercase;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #9ca3af;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: #1f2937;
            color: white;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .topbar p {
            color: #6b7280;
            font-size: 14px;
        }

        .profile {
            background: white;
            padding: 10px 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            font-size: 14px;
        }

        /* STATISTIC */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .stat-icon {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .stat-title {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: bold;
        }

        /* CONTENT */
        .content-card {
            background: white;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-header h2 {
            font-size: 20px;
        }

        .btn-add {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        /* SEARCH */
        .filter {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto auto;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter input,
        .filter select {
            border: 1px solid #e5e7eb;
            padding: 11px 12px;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
        }

        .filter input:focus,
        .filter select:focus {
            border-color: #2563eb;
        }

        .btn-search {
            border: none;
            background: #111827;
            color: white;
            padding: 0 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-reset {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            text-decoration: none;
            color: #374151;
            font-size: 13px;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            text-align: left;
            padding: 14px;
            font-size: 12px;
            text-transform: uppercase;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px;
            font-size: 13px;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .name {
            font-weight: bold;
        }

        .badge {
            background: #eff6ff;
            color: #2563eb;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge-jurusan {
            background: #f3f4f6;
            color: #374151;
        }

        /* AKSI */
        .aksi {
            display: flex;
            gap: 6px;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
            text-decoration: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 11px;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            border: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 11px;
            cursor: pointer;
        }

        /* ALERT */
        .alert {
            background: #ecfdf5;
            color: #047857;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 35px;
            color: #9ca3af;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .filter {
                grid-template-columns: 1fr;
            }

            .btn-search,
            .btn-reset {
                padding: 10px;
            }
        }

        @media (max-width: 700px) {
            .sidebar {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
            }

            .profile {
                display: none;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="logo">
        SISWA<span>.ID</span>
    </div>

    <div class="menu-title">
        Menu Utama
    </div>

    <div class="menu">

        <a href="{{ route('siswa.index') }}" class="active">
            Dashboard
        </a>

        <a href="{{ route('siswa.create') }}">
            + Tambah Siswa
        </a>

    </div>

</aside>


<!-- MAIN -->
<main class="main">

    <!-- HEADER -->
    <div class="topbar">

        <div>
            <h1>Dashboard</h1>
            <p>Kelola data siswa sekolah dengan mudah.</p>
        </div>

        <div class="profile">
            Administrator
        </div>

    </div>


    <!-- NOTIFIKASI -->
    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <!-- STATISTIK -->
    <div class="stats">

        <div class="stat-card">
            <div class="stat-icon">👨‍🎓</div>

            <div class="stat-title">
                Total Siswa
            </div>

            <div class="stat-number">
                {{ $totalSiswa }}
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">🏫</div>

            <div class="stat-title">
                Total Kelas
            </div>

            <div class="stat-number">
                {{ $totalKelas }}
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-icon">📚</div>

            <div class="stat-title">
                Total Jurusan
            </div>

            <div class="stat-number">
                {{ $totalJurusan }}
            </div>
        </div>

    </div>


    <!-- DATA SISWA -->
    <div class="content-card">

        <div class="content-header">

            <h2>Data Siswa</h2>

            <a href="{{ route('siswa.create') }}" class="btn-add">
                + Tambah Siswa
            </a>

        </div>


        <!-- SEARCH & FILTER -->
        <form
            action="{{ route('siswa.index') }}"
            method="GET"
            class="filter"
        >

            <input
                type="text"
                name="search"
                placeholder="Cari nama atau NIS..."
                value="{{ request('search') }}"
            >


            <select name="kelas_id">

                <option value="">
                    Semua Kelas
                </option>

                @foreach($kelas as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ request('kelas_id') == $item->id ? 'selected' : '' }}
                    >
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>


            <select name="jurusan_id">

                <option value="">
                    Semua Jurusan
                </option>

                @foreach($jurusan as $item)

                    <option
                        value="{{ $item->id }}"
                        {{ request('jurusan_id') == $item->id ? 'selected' : '' }}
                    >
                        {{ $item->nama }}
                    </option>

                @endforeach

            </select>


            <button
                type="submit"
                class="btn-search"
            >
                Cari
            </button>


            <a
                href="{{ route('siswa.index') }}"
                class="btn-reset"
            >
                Reset
            </a>

        </form>


        <!-- TABLE -->
        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($siswas as $siswa)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td class="name">
                                {{ $siswa->nama }}
                            </td>

                            <td>
                                {{ $siswa->nis }}
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $siswa->kelas }}
                                </span>
                            </td>

                            <td>
                                <span class="badge badge-jurusan">
                                    {{ $siswa->jurusan }}
                                </span>
                            </td>

                            <td>
                                {{ $siswa->alamat }}
                            </td>

                            <td>

                                <div class="aksi">

                                    <a
                                        href="{{ route('siswa.edit', $siswa->id) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('siswa.destroy', $siswa->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty"
                            >
                                Data siswa tidak ditemukan.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</main>

</body>
</html>