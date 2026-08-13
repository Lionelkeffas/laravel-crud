<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manajemen Jurusan</h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-100 border border-green-200 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 mb-6">
                <form action="{{ route('jurusan.store') }}" method="POST" class="flex flex-col md:flex-row gap-3">
                    @csrf
                    <input type="text" name="nama" placeholder="Tambah jurusan baru" required class="w-full md:flex-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700">Tambah Jurusan</button>
                </form>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 font-semibold">No</th>
                            <th class="px-4 py-3 font-semibold">Nama Jurusan</th>
                            <th class="px-4 py-3 font-semibold">Jumlah Siswa</th>
                            <th class="px-4 py-3 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jurusan as $item)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $item->nama }}</td>
                                <td class="px-4 py-3">{{ $item->siswas_count }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <form action="{{ route('jurusan.update', $item->id) }}" method="POST" class="flex gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="nama" value="{{ $item->nama }}" class="rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                            <button type="submit" class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded">Edit</button>
                                        </form>
                                        <form action="{{ route('jurusan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus jurusan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 bg-red-100 text-red-700 rounded">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-3 text-gray-500">Belum ada data jurusan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
