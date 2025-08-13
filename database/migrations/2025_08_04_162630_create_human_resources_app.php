<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deksripsi')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->date('tgl_kerja');
            $table->foreignId('departemen_id')->constrained('departemen');
            $table->foreignId('roles_id')->constrained('jabatan');
            $table->string('status');
            $table->decimal('gaji', 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->text('deksripsi')->nullable();
            $table->foreignId('ditugaskan')->constrained('karyawan');
            $table->date('tenggat_waktu');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan');
            $table->decimal('gaji', 10, 2);
            $table->decimal('bonus', 10, 2)->nullable();
            $table->decimal('potongan', 10, 2)->nullable();
            $table->decimal('total_gaji', 10, 2);
            $table->date('tanggal_gaji');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan');
            $table->date('waktu_masuk');
            $table->date('waktu_keluar');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_karyawan')->constrained('karyawan');
            $table->string('jenis_cuti');
            $table->date('awal_cuti');
            $table->date('akhir_cuti');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departemen');
        Schema::dropIfExists('jabatan');
        Schema::dropIfExists('karyawan');
        Schema::dropIfExists('tugas');
        Schema::dropIfExists('gaji');
        Schema::dropIfExists('kehadiran');
        Schema::dropIfExists('cuti');
    }
};
