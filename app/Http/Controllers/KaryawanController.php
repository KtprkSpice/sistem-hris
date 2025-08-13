<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\jabatan;
use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function show(int $id)
    {
        $karyawan = karyawan::findOrFail($id);
        $departemen = departemen::all();
        $role = jabatan::all();
        return view('karyawan.show', compact('karyawan'));
    }

    public function create()
    {
        $departemen = departemen::all();
        $role = jabatan::all();

        return view('karyawan.create', compact('departemen', 'role'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_lengkap" => "required|string|max:255",
            "email" => "required",
            "no_telepon" => "required|string|max:15",
            "alamat" => "required|nullable",
            "tgl_lahir" => "required|date",
            "tgl_kerja" => "required|date",
            "departemen_id" => "required",
            "roles_id" => "required",
            "status" => "required|string",
            "gaji" => "required|numeric"
        ]);

        karyawan::create($request->all());

        return redirect()->route("karyawan.index")->with("Berhasil", "Data Berhasil Ditambahkan");

    }

    public function edit(karyawan $karyawan) {
        $departemen = departemen::all();
        $role = jabatan::all();


        return view("karyawan.edit", compact("karyawan", "departemen", "role"));

    }

    public function update(Request $request, karyawan $karyawan) {
        $validated = $request->validate([
            "nama_lengkap" => "required|string|max:255",
            "email" => "required",
            "no_telepon" => "required|string",
            "alamat" => "nullable|string|max:500",
            "tgl_lahir" => "required|date",
            "tgl_kerja" => "date|required",
            "departemen_id" => "required",
            "roles_id" => "required",
            "status" => "required|string",
            "gaji" => "required|numeric"
        ]);

        $karyawan->update($validated);
        return redirect()->route("karyawan.index")->with("Berhasil", "Berhasil Mengupdate Data");
    }

    public function destroy(karyawan $karyawan ) {

        $karyawan->delete();

        return redirect()->route("karyawan.index")->with("Berhasil", "Data Berhasil Dihapus");
    }
}
