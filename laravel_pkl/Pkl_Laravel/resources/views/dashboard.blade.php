<x-app-layout>

    <style>
        .dashboard-page {
            min-height: calc(100vh - 65px);
            background: #f5f7fb;
            padding: 30px;
        }

        .dashboard-container {
            max-width: 1450px;
            margin: auto;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 20px;
        }

        .welcome h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
            color: #111827;
        }

        .welcome p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .date-box {
            background: white;
            border: 1px solid #e5e7eb;
            padding: 11px 16px;
            border-radius: 12px;
            color: #4f46e5;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 3px 12px rgba(0,0,0,.04);
        }

        /* STAT CARD */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .05);
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, .09);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            right: -35px;
            bottom: -45px;
            opacity: .12;
        }

        .purple::after {
            background: #7c3aed;
        }

        .blue::after {
            background: #2563eb;
        }

        .green::after {
            background: #10b981;
        }

        .orange::after {
            background: #f59e0b;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .purple .stat-icon {
            background: #ede9fe;
        }

        .blue .stat-icon {
            background: #dbeafe;
        }

        .green .stat-icon {
            background: #d1fae5;
        }

        .orange .stat-icon {
            background: #fef3c7;
        }

        .stat-label {
            margin-top: 18px;
            color: #6b7280;
            font-size: 13px;
        }

        .stat-number {
            margin-top: 4px;
            font-size: 30px;
            font-weight: 800;
            color: #111827;
        }

        .stat-desc {
            margin-top: 3px;
            font-size: 12px;
            color: #9ca3af;
        }

        /* MAIN GRID */
        .main-grid {
            display: grid;
            grid-template-columns: 1.1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
        }

        .panel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .05);
        }

        .panel-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .panel-title h3 {
            margin: 0;
            font-size: 17px;
            font-weight: 750;
            color: #111827;
        }

        .panel-subtitle {
            color: #9ca3af;
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* GENDER */
        .gender-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 28px;
            min-height: 220px;
        }

        .donut {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            position: relative;
            background:
                conic-gradient(
                    #6366f1
                    {{ $totalSiswa > 0 ? ($lakiLaki / $totalSiswa) * 100 : 0 }}%,
                    #ec4899 0
                    {{ $totalSiswa > 0 ? (($lakiLaki + $perempuan) / $totalSiswa) * 100 : 0 }}%,
                    #e5e7eb 0
                );
        }

        .donut::after {
            content: "";
            position: absolute;
            width: 92px;
            height: 92px;
            background: white;
            border-radius: 50%;
            top: 29px;
            left: 29px;
        }

        .donut-center {
            position: absolute;
            z-index: 2;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .donut-center strong {
            font-size: 25px;
            color: #111827;
        }

        .donut-center span {
            color: #9ca3af;
            font-size: 11px;
        }

        .legend {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 130px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot-blue {
            background: #6366f1;
        }

        .dot-pink {
            background: #ec4899;
        }

        .legend-text {
            font-size: 12px;
            color: #6b7280;
        }

        .legend-number {
            display: block;
            font-weight: 750;
            font-size: 15px;
            color: #111827;
            margin-top: 2px;
        }

        /* DISTRIBUTION */
        .distribution {
            display: flex;
            flex-direction: column;
            gap: 17px;
        }

        .distribution-item {
            width: 100%;
        }

        .distribution-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 7px;
            font-size: 13px;
        }

        .distribution-name {
            font-weight: 600;
            color: #374151;
        }

        .distribution-count {
            color: #6b7280;
            font-weight: 600;
        }

        .progress {
            width: 100%;
            height: 9px;
            background: #eef2f7;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            border-radius: 20px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transition: width .5s ease;
        }

        .progress-bar.green {
            background: linear-gradient(90deg, #10b981, #34d399);
        }

        .distribution-percent {
            margin-top: 4px;
            font-size: 10px;
            color: #9ca3af;
        }

        /* EXPORT */
        .export-panel {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 20px;
        }

        .export-title h3 {
            margin: 0;
            font-size: 17px;
        }

        .export-title p {
            margin: 5px 0 0;
            color: #9ca3af;
            font-size: 12px;
        }

        .export-buttons {
            display: flex;
            gap: 10px;
        }

        .export-btn {
            padding: 10px 16px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 650;
            transition: .2s;
        }

        .export-btn:hover {
            transform: translateY(-2px);
        }

        .pdf {
            background: #ef4444;
        }

        .excel {
            background: #10b981;
        }

        /* TABLE */
        .table-panel {
            overflow: hidden;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .table-header h3 {
            margin: 0;
            font-size: 17px;
        }

        .see-all {
            text-decoration: none;
            color: #6366f1;
            font-size: 12px;
            font-weight: 650;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
        }

        .student-table th {
            background: #f8fafc;
            color: #6b7280;
            font-size: 11px;
            text-align: left;
            padding: 13px;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .student-table td {
            padding: 14px 13px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-size: 13px;
        }

        .student-table tr:last-child td {
            border-bottom: none;
        }

        .student-name {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 650;
            color: #111827;
        }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #ede9fe;
            color: #6366f1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 750;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 7px;
            font-size: 10px;
            font-weight: 650;
            background: #eef2ff;
            color: #4f46e5;
        }

        .empty {
            text-align: center;
            padding: 35px !important;
            color: #9ca3af !important;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-grid {
                grid-template-columns: 1fr 1fr;
            }

            .gender-panel {
                grid-column: span 2;
            }
        }

        @media (max-width: 750px) {
            .dashboard-page {
                padding: 18px;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome h1 {
                font-size: 25px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .gender-panel {
                grid-column: span 1;
            }

            .gender-content {
                flex-direction: column;
            }

            .export-panel {
                flex-direction: column;
                align-items: flex-start;
            }

            .export-buttons {
                width: 100%;
            }

            .export-btn {
                flex: 1;
                text-align: center;
            }
        }
    </style>

    <div class="dashboard-page">

        <div class="dashboard-container">

            {{-- HEADER --}}
            <div class="welcome">

                <div>
                    <h1>Dashboard</h1>
                    <p>Ringkasan informasi data siswa sekolah</p>
                </div>

                <div class="date-box">
                    📅 {{ now()->translatedFormat('l, d F Y') }}
                </div>

            </div>


            {{-- STATISTICS --}}
            <div class="stats-grid">

                <div class="stat-card purple">

                    <div class="stat-top">
                        <div class="stat-icon">👨‍🎓</div>
                    </div>

                    <div class="stat-label">
                        Total Siswa
                    </div>

                    <div class="stat-number">
                        {{ $totalSiswa }}
                    </div>

                    <div class="stat-desc">
                        Siswa terdaftar
                    </div>

                </div>


                <div class="stat-card blue">

                    <div class="stat-top">
                        <div class="stat-icon">🏫</div>
                    </div>

                    <div class="stat-label">
                        Total Kelas
                    </div>

                    <div class="stat-number">
                        {{ $totalKelas }}
                    </div>

                    <div class="stat-desc">
                        Kelas tersedia
                    </div>

                </div>


                <div class="stat-card green">

                    <div class="stat-top">
                        <div class="stat-icon">📚</div>
                    </div>

                    <div class="stat-label">
                        Total Jurusan
                    </div>

                    <div class="stat-number">
                        {{ $totalJurusan }}
                    </div>

                    <div class="stat-desc">
                        Jurusan tersedia
                    </div>

                </div>


                <div class="stat-card orange">

                    <div class="stat-top">
                        <div class="stat-icon">👥</div>
                    </div>

                    <div class="stat-label">
                        Laki-laki / Perempuan
                    </div>

                    <div class="stat-number">
                        {{ $lakiLaki }} / {{ $perempuan }}
                    </div>

                    <div class="stat-desc">
                        Statistik jenis kelamin
                    </div>

                </div>

            </div>


            {{-- MAIN STATISTICS --}}
            <div class="main-grid">

                {{-- GENDER --}}
                <div class="panel gender-panel">

                    <div class="panel-title">
                        <h3>Statistik Siswa</h3>
                    </div>

                    <div class="panel-subtitle">
                        Berdasarkan jenis kelamin
                    </div>

                    <div class="gender-content">

                        <div class="donut">

                            <div class="donut-center">
                                <strong>{{ $totalSiswa }}</strong>
                                <span>Siswa</span>
                            </div>

                        </div>


                        <div class="legend">

                            <div class="legend-item">

                                <span class="dot dot-blue"></span>

                                <div class="legend-text">
                                    Laki-laki
                                    <span class="legend-number">
                                        {{ $lakiLaki }}
                                    </span>
                                </div>

                            </div>


                            <div class="legend-item">

                                <span class="dot dot-pink"></span>

                                <div class="legend-text">
                                    Perempuan
                                    <span class="legend-number">
                                        {{ $perempuan }}
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- KELAS --}}
                <div class="panel">

                    <div class="panel-title">
                        <h3>Distribusi Kelas</h3>
                    </div>

                    <div class="panel-subtitle">
                        Jumlah siswa berdasarkan kelas
                    </div>

                    <div class="distribution">

                        @forelse($kelasData as $kelas)

                            @php
                                $percentage = $totalSiswa > 0
                                    ? ($kelas->siswas_count / $totalSiswa) * 100
                                    : 0;
                            @endphp

                            <div class="distribution-item">

                                <div class="distribution-header">

                                    <span class="distribution-name">
                                        Kelas {{ $kelas->nama }}
                                    </span>

                                    <span class="distribution-count">
                                        {{ $kelas->siswas_count }} siswa
                                    </span>

                                </div>

                                <div class="progress">

                                    <div
                                        class="progress-bar"
                                        style="width: {{ $percentage }}%"
                                    ></div>

                                </div>

                                <div class="distribution-percent">
                                    {{ number_format($percentage, 0) }}%
                                </div>

                            </div>

                        @empty

                            <p style="color:#9ca3af;">
                                Belum ada data kelas.
                            </p>

                        @endforelse

                    </div>

                </div>


                {{-- JURUSAN --}}
                <div class="panel">

                    <div class="panel-title">
                        <h3>Distribusi Jurusan</h3>
                    </div>

                    <div class="panel-subtitle">
                        Jumlah siswa berdasarkan jurusan
                    </div>

                    <div class="distribution">

                        @forelse($jurusanData as $jurusan)

                            @php
                                $percentage = $totalSiswa > 0
                                    ? ($jurusan->siswas_count / $totalSiswa) * 100
                                    : 0;
                            @endphp

                            <div class="distribution-item">

                                <div class="distribution-header">

                                    <span class="distribution-name">
                                        {{ $jurusan->nama }}
                                    </span>

                                    <span class="distribution-count">
                                        {{ $jurusan->siswas_count }}
                                    </span>

                                </div>

                                <div class="progress">

                                    <div
                                        class="progress-bar green"
                                        style="width: {{ $percentage }}%"
                                    ></div>

                                </div>

                            </div>

                        @empty

                            <p style="color:#9ca3af;">
                                Belum ada data jurusan.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- EXPORT --}}
            <div class="panel export-panel">

                <div class="export-title">

                    <h3>Export Data</h3>

                    <p>
                        Download data siswa dalam format PDF atau Excel.
                    </p>

                </div>

                <div class="export-buttons">

                    <a
                        href="{{ route('dashboard.export.pdf') }}"
                        class="export-btn pdf"
                    >
                        📄 Export PDF
                    </a>

                    <a
                        href="{{ route('dashboard.export.excel') }}"
                        class="export-btn excel"
                    >
                        📊 Export Excel
                    </a>

                </div>

            </div>


            {{-- RECENT STUDENTS --}}
            <div class="panel table-panel">

                <div class="table-header">

                    <div>
                        <h3>Data Siswa Terbaru</h3>

                        <p style="margin:5px 0 0;color:#9ca3af;font-size:12px;">
                            Data siswa yang terakhir ditambahkan
                        </p>
                    </div>

                    <a
                        href="{{ route('siswa.index') }}"
                        class="see-all"
                    >
                        Lihat semua →
                    </a>

                </div>


                @php
                    $recentSiswa = App\Models\Siswa::latest()
                        ->take(5)
                        ->get();
                @endphp


                <div class="table-wrapper">

                    <table class="student-table">

                        <thead>

                            <tr>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($recentSiswa as $siswa)

                                <tr>

                                    <td>

                                        <div class="student-name">

                                            <div class="avatar">
                                                {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                                            </div>

                                            {{ $siswa->nama }}

                                        </div>

                                    </td>

                                    <td>
                                        {{ $siswa->nis }}
                                    </td>

                                    <td>
                                        <span class="badge">
                                            {{ $siswa->kelas ?? '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $siswa->jurusan ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $siswa->jenis_kelamin ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="empty"
                                    >
                                        Belum ada data siswa.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>