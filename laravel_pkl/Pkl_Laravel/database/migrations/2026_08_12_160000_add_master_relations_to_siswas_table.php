<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('jenis_kelamin')->nullable()->after('jurusan');
            $table->unsignedBigInteger('kelas_id')->nullable()->after('jenis_kelamin');
            $table->unsignedBigInteger('jurusan_id')->nullable()->after('kelas_id');

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
            $table->dropForeign(['jurusan_id']);
            $table->dropColumn(['jenis_kelamin', 'kelas_id', 'jurusan_id']);
        });
    }
};
