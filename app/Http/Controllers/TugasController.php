<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\tugas;
use Illuminate\Http\Request;

// Controller Semacam Logika Dari data ataupun page dalam reactJs bisa di sebuat sebagai UseEffect atau UseState
class TugasController extends Controller
{
    public function index()
    {
        //ini untuk ambil data all() berarti ambil data dari tugas semuanya $tugas itu variable

        if(session("jabatan") == "HR") {

            $tugas = tugas::all();
        } else {
            $tugas = tugas::where("ditugaskan", session("id_karyawan"))->get();
        }
        return view('tasks.index', compact('tugas'));
    }

    public function create()
    {
        $karyawan = karyawan::all();
        return view('tasks.create', compact('karyawan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'ditugaskan' => 'required',
            'tenggat_waktu' => 'date|required',
            'status' => 'required|string',
            'deksripsi' => 'nullable',

            // Jika Berhasil
        ]);
        tugas::create($validated);

        // Ini fungsingya jika selesai dibuat akan ke direct page index tugas dan akan menampilkan pesan yang ada di with()
        return redirect()->route('tugas.index')->with('Berhasil', 'Tugas Berhasil Dibuat');
    }

    // Untuk View Page Edit
    public function edit(tugas $tugas)
    {
        $karyawan = karyawan::all();

        return view('tasks.edit', compact('tugas', 'karyawan'));
    }

    // Untuk Logic Update atau edit
    public function update(Request $request, tugas $tugas)
    {
        $validated = $request->validate([
            'nama_tugas' => 'required|string|max:255',
            'ditugaskan' => 'required',
            'tenggat_waktu' => 'date|required',
            'status' => 'required|string',
            'deksripsi' => 'nullable',

            // Jika Berhasil
        ]);
        // Kenapa Pake $tugas->update() bukan tugas::update(), kalo ppake tugas:: itu akan update semua data di table sedangkan yake pake tugas-> itu sepesifik misal saya mau update data 3 yang ke update hanya id 3
        $tugas->update($validated);

        return redirect()->route('tugas.index')->with('Berhasil', 'Tugas Berhasil Di Edit');
    }

    public function done(int $id)
    {
        $tugas = tugas::find($id);
        $tugas->update(['status' => 'done']);

        return redirect()->route('tugas.index')->with('Berhasil', 'Tugas Di Tandai Menjadi Done');
    }
    public function pending(int $id)
    {
        $tugas = tugas::find($id);
        $tugas->update(['status' => 'pending']);

        return redirect()->route('tugas.index')->with('Berhasil', 'Tugas Di Tandai Menjadi Pending');
    }

    public function show(tugas $tugas)
    {
        $karyawan = karyawan::all();

        return view('tasks.view', compact('tugas'));
    }

    public function destroy(tugas $tugas)
    {
        $tugas->delete();

        return redirect()->route('tugas.index')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
