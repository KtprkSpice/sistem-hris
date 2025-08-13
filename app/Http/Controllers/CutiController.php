<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        if (session('jabatan') == 'HR') {
            $cuti = cuti::all();
        } else {
            $cuti = cuti::where('id_karyawan', session('id_karyawan'))->get();
        }

        return view('cuti.index', compact('cuti'));
    }

    public function create()
    {
        $karyawan = karyawan::all();
        return view('cuti.create', compact('karyawan'));
    }

    public function store(Request $request)
    {
        if (session('jabatan') == 'HR') {
            $request->validate([
                'id_karyawan' => 'required',
                'jenis_cuti' => 'required|string|max:255',
                'awal_cuti' => 'required|date',
                'akhir_cuti' => 'required|date',
            ]);
            $request->merge([
                'status' => 'pending',
            ]);
            cuti::create($request->all());
        } else {
            cuti::create([
                'id_karyawan' => session('id_karyawan'),
                'jenis_cuti' => $request->jenis_cuti,
                'awal_cuti' => $request->awal_cuti,
                'akhir_cuti' => $request->akhir_cuti,
                'status' => 'pending',
            ]);
        }

        // Requset merge untuk default input kan di cuti secara deafault ketika mau buat cuti gak akan pilih dia udah diterima atau gaknya jadi harus ada isi defaultnya yaitu pending

        return redirect()->route('cuti.index')->with('Berhasil', 'Data Berhasil Ditambahkan');
    }

    public function edit(cuti $cuti)
    {
        $karyawan = karyawan::all();

        return view('cuti.edit', compact('cuti', 'karyawan'));
    }

    public function update(Request $request, cuti $cuti)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'jenis_cuti' => 'required|string|max:255',
            'awal_cuti' => 'required|date',
            'akhir_cuti' => 'required|date',
        ]);

        $cuti->update($request->all());

        return redirect()->route('cuti.index')->with('Berhasil', 'Data Berhasil Diupdate');
    }

    public function destroy(cuti $cuti)
    {
        $cuti->delete();

        return redirect()->route('cuti.index')->with('Berhasil', 'Data Berhasil Dihapus');
    }

    public function confirm($id)
    {
        $cuti = cuti::findOrFail($id);

        $cuti->update([
            'status' => 'accepted',
        ]);

        return redirect()
            ->route('cuti.index')
            ->with('Berhasil', 'Cuti atas nama <strong>' . e($cuti->karyawan->nama_lengkap) . '</strong> untuk <strong>' . e($cuti->jenis_cuti) . '</strong> berhasil di <strong>setujui</strong> ');
    }

    public function reject($id)
    {
        $cuti = cuti::findOrFail($id);

        $cuti->update([
            'status' => 'rejected',
        ]);

        return redirect()
            ->route('cuti.index')
            ->with('Berhasil', 'Cuti atas nama <strong>' . e($cuti->karyawan->nama_lengkap) . '</strong> untuk <strong>' . e($cuti->jenis_cuti) . '</strong> telah di <strong>tolak</strong>');
    }
}
