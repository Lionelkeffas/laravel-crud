<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Siswa</h2>
            <a href="{{ route('siswa.index') }}" class="px-4 py-2 bg-gray-900 text-white rounded-lg hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-500">NIS</p>
                        <p class="mt-1 text-lg font-semibold">{{ $siswa->nis }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Nama</p>
                        <p class="mt-1 text-lg font-semibold">{{ $siswa->nama }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kelas</p>
                        <p class="mt-1 text-lg">{{ $siswa->kelasRelation?->nama ?? $siswa->kelas ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jurusan</p>
                        <p class="mt-1 text-lg">{{ $siswa->jurusanRelation?->nama ?? $siswa->jurusan ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Jenis Kelamin</p>
                        <p class="mt-1 text-lg">{{ $siswa->jenis_kelamin ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="mt-1 text-lg">{{ $siswa->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
