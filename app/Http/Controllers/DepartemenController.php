<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\karyawan;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = departemen::all();
        return view('departemen.index', compact('departemen'));
    }

    public function create()
    {

        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deksripsi' => 'nullable|string|max:500',
            'status' => 'required|string',
        ]);

        departemen::create($validated);

        return redirect()->route('departemen.index')->with('Berhasil', 'Data Berhasil Ditambahkan');
    }

    public function show(int $id)
    {
        $departemen = departemen::findOrFail($id);

        return view('departemen.show', compact('departemen'));
    }

    public function edit($id)
    {
        $departemen = departemen::findOrFail($id);
        return view('departemen.edit', compact("departemen"));
    }

    public function update(Request $request, departemen $departemen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deksripsi' => 'nullable|string|max:500',
            'status' => 'required|string',
        ]);

        $departemen->update($validated);

        return redirect()->route('departemen.index')->with('Berhasil', 'Data Berhasil Diupdate');
    }

    public function destroy(departemen $departemen) {
        $departemen->delete();

        return redirect()->route("departemen.index")->with("Berhasil", "Data Berhasil Dihapus");
    }
}
