<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections=Collection::all();
        return view('koleksi.daftarKoleksi', compact('collections'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('koleksi.registrasi');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100'],
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahKoleksi' => ['required', 'integer'],
        ]);

        $collections=Collection::create([
        'namaKoleksi' => $request->namaKoleksi,
        'jenisKoleksi' => $request->jenisKoleksi,
        'jumlahKoleksi' => $request->jumlahKoleksi,
        ]);

        return redirect()->route("koleksi.daftarKoleksi");
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));
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
    public function destroy(string $id)
    {
        //
    }
}
