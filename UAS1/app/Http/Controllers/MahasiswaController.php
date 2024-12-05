<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Exports\MahasiswasExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('master-data.mahasiswa-master.index-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-data.mahasiswa-master.create-mahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Log semua data yang diterima dari form
    Log::info('Data yang diterima dari form:', $request->all());

    $validated = $request->validate([
        'npm' => 'required|integer|unique:mahasiswa|digits_between:1,20',
        'nama' => 'required|string|max:255',
        'prodi' => 'required|string|max:255',
    ]);

    // Log data yang berhasil divalidasi
    Log::info('Data yang divalidasi:', $validated);

    // Simpan data ke database
    Mahasiswa::create($validated);

    return redirect()->route('mahasiswa-index')->with('success', 'Data mahasiswa berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa-index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }

    public function exportExcel()
    {
        return Excel::download(new MahasiswasExport, 'mahasiswa.xlsx');
    }
}
