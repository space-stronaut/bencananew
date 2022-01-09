<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\KategoriBencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bencanas = Bencana::all();

        return view('bencana.index', compact('bencanas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = KategoriBencana::all();

        return view('bencana.create', compact('kategoris'));
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
            'nama' => ['required'],
            'kategori_id' => ['required']
        ]);

        Bencana::create($request->all());

        return redirect()->route('bencana.index');
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
        $kategoris = KategoriBencana::all();
        $bencana = Bencana::find($id);

        return view('bencana.edit', compact('kategoris', 'bencana'));
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
            'nama' => ['required'],
            'kategori_id' => ['required']
        ]);

        Bencana::find($id)->update($request->all());

        return redirect()->route('bencana.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bencana::find($id)->delete();

        return back();
    }
}
