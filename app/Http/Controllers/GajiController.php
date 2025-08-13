<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\karyawan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        if (session('jabatan') == 'HR') {
            $gaji = gaji::all();
        } else {
            $gaji = gaji::where('id_karyawan', session('id_karyawan'))->get();
        }

        return view('gaji.index', compact('gaji'));
    }

    public function create()
    {
            $karyawan = karyawan::all();
            $gaji = gaji::all();
        return view('gaji.create', compact('gaji', 'karyawan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|numeric',
            'gaji' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
            'tanggal_gaji' => 'required|date',
        ]);

        $totalGaji = $request->input('gaji') - $request->input('potongan') + $request->input('bonus');

        $request->merge(['total_gaji' => $totalGaji]);

        gaji::create($request->all());
        return redirect()->route('gaji.index')->with('Berhasil', 'Data Berhasil Ditambahkan');
    }

    public function edit(gaji $gaji)
    {
        $karyawan = karyawan::all();

        return view('gaji.edit', compact('gaji', 'karyawan'));
    }

    public function update(Request $request, gaji $gaji)
    {
        $request->validate([
            'id_karyawan' => 'required|numeric',
            'gaji' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
            'tanggal_gaji' => 'required|date',
        ]);

        $totalGaji = $request->input('gaji') - $request->input('potongan') + $request->input('bonus');

        $request->merge(['total_gaji' => $totalGaji]);

        $gaji->update($request->all());

        return redirect()->route('gaji.index')->with('Berhasil', 'Data Berhasil Diupdate');
    }

    public function show(gaji $gaji)
    {
        return view('gaji.show', compact('gaji'));
    }

    public function destroy(gaji $gaji)
    {
        $gaji->delete();

        return redirect()->route('gaji.index')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
