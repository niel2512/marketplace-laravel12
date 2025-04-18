<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Http\Requests\StoretokoRequest;
use App\Http\Requests\UpdatetokoRequest;


class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $toko = Toko::all();
        return view('toko/view',
                    [
                        'toko' => $toko
                    ]
                  );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // berikan kode perusahaan secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        
        return view('toko/create',
                    [
                        'kode_toko' => Toko::getKodeToko()
                    ]
                  );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretokoRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'nama_toko' => 'required|unique:toko|max:255',
            'alamat_toko' => 'required',
        ]);

        // masukkan ke db
        Toko::create($request->all());
        
        return redirect()->route('toko.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(toko $toko)
    {
        // return view('toko.show', compact('toko'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(toko $toko)
    {
        return view('toko.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetokoRequest $request, toko $toko)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'nama_toko' => 'required|max:255',
            'alamat_toko' => 'required',
        ]);
    
        $toko->update($validated);
    
        return redirect()->route('toko.index')->with('success','Data Berhasil di Ubah');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari database
        $toko= Toko::findOrFail($id);
        $toko->delete();

        return redirect()->route('toko.index')->with('success','Data Berhasil di Hapus');
    }
}
