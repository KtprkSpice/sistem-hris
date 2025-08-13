<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use faker\Factory as faker;
use Carbon\Carbon;

class humanResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('departemen')->insert([
            [
                'nama' => 'HR',
                'deksripsi' => 'Human Resources',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'IT',
                'deksripsi' => 'Information Technology',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'Sales',
                'deksripsi' => 'Sales Departement',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('jabatan')->insert([
            [
                'nama_jabatan' => 'HR',
                'deskripsi' => 'Human Resources Management',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_jabatan' => 'Deleloper',
                'deskripsi' => 'Code Developer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_jabatan' => 'Sales',
                'deskripsi' => 'Handling Selling ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('karyawan')->insert([
            [
                'nama_lengkap' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'no_telepon' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'tgl_kerja' => Carbon::now(),
                'departemen_id' => 1,
                'roles_id' => 1,
                'status' => 'active',
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'nama_lengkap' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'no_telepon' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'tgl_kerja' => Carbon::now(),
                'departemen_id' => 2,
                'roles_id' => 2,
                'status' => 'active',
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'nama_lengkap' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'no_telepon' => $faker->phoneNumber(),
                'alamat' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween('-40 years', '-20 years'),
                'tgl_kerja' => Carbon::now(),
                'departemen_id' => 3,
                'roles_id' => 3,
                'status' => 'active',
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);

        DB::table('tugas')->insert([
            [
                'nama_tugas' => $faker->sentence(3),
                'deksripsi' => $faker->paragraph(),
                'ditugaskan' => 1,
                'tenggat_waktu' => Carbon::parse('2025-09-14'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_tugas' => $faker->sentence(3),
                'deksripsi' => $faker->paragraph(),
                'ditugaskan' => 2,
                'tenggat_waktu' => Carbon::parse('2025-09-14'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_tugas' => $faker->sentence(3),
                'deksripsi' => $faker->paragraph(),
                'ditugaskan' => 3,
                'tenggat_waktu' => Carbon::parse('2025-09-14'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('gaji')->insert([
            [
                'id_karyawan' => 1,
                'gaji' => $faker->randomFloat(2, 3000, 6000),
                'bonus' => $faker->randomFloat(2, 3000, 6000),
                'potongan' => $faker->randomFloat(2, 500, 2000),
                'total_gaji' => $faker->randomFloat(2, 3000, 6000),
                'tanggal_gaji' => Carbon::parse('2025-09-14'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('kehadiran')->insert([
            [
                'id_karyawan' => 1,
                'waktu_masuk' => Carbon::parse('2025-08-10 09:00:00'),
                'waktu_keluar' => Carbon::parse('2025-08-10 17:00:00'),
                'tanggal' => Carbon::parse('2025-05-10'),
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 2,
                'waktu_masuk' => Carbon::parse('2025-08-10 09:00:00'),
                'waktu_keluar' => Carbon::parse('2025-08-10 17:00:00'),
                'tanggal' => Carbon::parse('2025-05-10'),
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 3,
                'waktu_masuk' => Carbon::parse('2025-08-10 09:00:00'),
                'waktu_keluar' => Carbon::parse('2025-08-10 17:00:00'),
                'tanggal' => Carbon::parse('2025-05-10'),
                'status' => 'hadir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('cuti')->insert([
            [
                'id_karyawan' => 1,
                'jenis_cuti' => 'Sakit',
                'awal_cuti' => Carbon::parse('2025-09-20'),
                'akhir_cuti' => Carbon::parse('2025-09-25'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 2,
                'jenis_cuti' => 'Liburan',
                'awal_cuti' => Carbon::parse('2025-08-20'),
                'akhir_cuti' => Carbon::parse('2025-08-25'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
