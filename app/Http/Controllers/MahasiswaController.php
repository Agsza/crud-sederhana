<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil semua data mahasiswa dari database, diurutkan terbaru
        $mahasiswas = Mahasiswa::latest()->paginate(5);

        //kirim data ke view 'mahasiswa.index'
        return view('mahasiswa.index', compact('mahasiswas'))
               ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('mahasiswa.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //lakukan validasi data
        $request->validate([
            'nim' => 'required | unique:mahasiswas|max:15',
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:50'
        ]);

        //simpan data kedatabase
        Mahasiswa::create($request->all());

        //redirect kembali kehalaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa berhasil ditambahkan.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //validate data
        $request->validate([
            'nim' => 'required|max:15|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:50',

        ]);

        //perbarui data didatabase
        $mahasiswa->update($request->all());

        //redirect kembali kehalaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('seccess', 'Data Mahasiswa berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {

        //hapus data dari database
        $mahasiswa->delete();

        //redirect kembali ke halaman index
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa berhasil dihapus.');
        
        


    }
}
