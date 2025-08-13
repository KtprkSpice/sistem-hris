<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\gaji;
use App\Models\karyawan;
use App\Models\kehadiran;
use App\Models\tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = karyawan::count();
        $departemen = departemen::count();
        $gaji = gaji::count();
        $kehadiran = kehadiran::count();

        $tugasTerbaru = tugas::latest()->take(3)->get();
        return view('dashboard.index', compact('karyawan', 'departemen', 'gaji', 'kehadiran', 'tugasTerbaru'));
    }

    public function presences()
    {
        $data = tugas::where('status', 'done')->selectRaw('MONTH(tenggat_waktu) as month, YEAR(tenggat_waktu) as year, count(*) as total_present')->groupBy('year', 'month')->orderBy('month', 'asc')->get();

        // Siapkan array default 12 bulan
        $result = array_fill(0, 12, 0);

        foreach ($data as $item) {
            $result[$item->month - 1] = $item->total_present;
        }

        return response()->json($result);
    }
}
