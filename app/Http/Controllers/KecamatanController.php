<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::all();

        return view('kecamatan.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kotas = Kota::all();

        return view('kecamatan.create', compact('kotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'kota_id' => ['required'],
            'nama' => ['required']
        ]);

        Kecamatan::create($request->all());

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kotas = Kota::all();
        $kecamatan = Kecamatan::find($id);

        return view('kecamatan.edit', compact('kotas', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'kota_id' => ['required'],
            'nama' => ['required']
        ]);

        Kecamatan::find($id)->update($request->all());

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kecamatan::find($id)->delete();

        return redirect()->back();
    }
}
