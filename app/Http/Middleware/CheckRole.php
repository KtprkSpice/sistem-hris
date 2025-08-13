<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\karyawan;
use App\Models\User;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Error Ini biarin aja yang User
    public function handle(Request $request, Closure $next, string ...$jabatan): Response
    {
        $idKaryawan = auth()->user()->id_karyawan;
        $karyawan = karyawan::find($idKaryawan);

        $request->session()->put('jabatan', $karyawan->jabatan->nama_jabatan);
        $request->session()->put('id_karyawan', $karyawan->id);

        if (!in_array($karyawan->jabatan->nama_jabatan, $jabatan)) {
            abort(403, 'Unathorized Action');
        }
        return $next($request);
    }
}
