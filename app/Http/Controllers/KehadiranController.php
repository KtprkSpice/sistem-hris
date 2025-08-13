<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\kehadiran;
use Illuminate\Http\Request;
use illuminate\Support\Carbon;

class KehadiranController extends Controller
{
    public function index()
    {
        if (session('jabatan') == 'HR') {
            $kehadiran = kehadiran::all();
        } else {
            $kehadiran = kehadiran::where('id_karyawan', session('id_karyawan'))->get();
        }

        return view('kehadiran.index', compact('kehadiran'));
    }

    public function create()
    {
        $kehadiran = kehadiran::all();
        $karyawan = karyawan::all();

        return view('kehadiran.create', compact('kehadiran', 'karyawan'));
    }

    public function store(Request $request)
    {
        if (session('jabatan') == 'HR') {
            $request->validate([
                'id_karyawan' => 'required',
                'waktu_masuk' => 'required|date_format:Y-m-d H:i',
                'waktu_keluar' => 'required|date_format:Y-m-d H:i',
                'tanggal' => 'required|date',
                'status' => 'required|string',
            ]);
            

            kehadiran::create( $request->all());
        }else {
            kehadiran::create([
                "id_karyawan" => session("id_karyawan"),
                "waktu_masuk" => Carbon::now(),
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "tanggal" => Carbon::now()->format("Y-m-d"),
                "status" => "hadir"
            ]);
        }

        return redirect()->route('kehadiran.index')->with('Berhasil', 'Data Berhasil Dibuat');
    }

    public function edit(kehadiran $kehadiran)
    {
        $karyawan = karyawan::all();

        return view('kehadiran.edit', compact('kehadiran', 'karyawan'));
    }

    public function update(Request $request, kehadiran $kehadiran)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required',
            'waktu_masuk' => 'required|date_format:Y-m-d H:i',
            'waktu_keluar' => 'required|date_format:Y-m-d H:i',
            'tanggal' => 'required|date',
            'status' => 'required|string',
        ]);

        $kehadiran->update($validated);

        return redirect()->route('kehadiran.index')->with('Berhasil', 'Data Berhasil DiUpdate');
    }

    public function destroy(kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')->with('Berhasil', 'Data Berhasil Dihapus');
    }
}
