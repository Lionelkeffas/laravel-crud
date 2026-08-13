<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach (['10', '11', '12'] as $namaKelas) {
            Kelas::firstOrCreate(['nama' => $namaKelas]);
        }

        foreach (['RPL', 'TKJ', 'DKV', 'TOI', 'LPB'] as $namaJurusan) {
            Jurusan::firstOrCreate(['nama' => $namaJurusan]);
        }
    }
}
