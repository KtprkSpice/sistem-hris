<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = jabatan::all();

        return view('jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        return view("jabatan.create");
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "nama_jabatan" => "required|string|max:255",
            "deskripsi" => "nullable",
        ]);

        jabatan::create($validated);

        return redirect()->route("jabatan.index")->with("Berhasil", "Data Berhasil Ditambahkan");
    }

    public function edit(jabatan $jabatan) {
        return view("jabatan.edit", compact("jabatan"));
    }

    public function update(Request $request, jabatan $jabatan) {
        $validated = $request->validate([
            "nama_jabatan" => "required|string|max:255",
            "deskripsi" => "nullable",
        ]);

        $jabatan->update($validated);

        return redirect()->route("jabatan.index")->with("Berhasil", "Data Berhasil Di Update");
    }

    public function destroy(jabatan $jabatan) {
        $jabatan->delete();

        return redirect()->route("jabatan.index", compact("jabatan"))->with("Berhasil", "Berhasil Hapus Data");
    }
}
