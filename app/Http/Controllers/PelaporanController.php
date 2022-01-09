<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Korban;
use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->nama == 'masyarakt') {
            $pelaporans = Pelaporan::where('user_id', Auth::user()->id)->get();
        }else{
            $pelaporans = Pelaporan::all();
        }

        return view('pelaporan.index', compact('pelaporans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bencanas = Bencana::all();

        return view('pelaporan.create', compact('bencanas'));
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
            'bencana_id' => ['required'],
            'waktu_bencana' => ['required']
        ]);

        $data = $request->all();

        if ($request->file('file')) {
            $data['file'] = $request->file('file')->store('file', 'public');
        }

        Pelaporan::create($data);

        return redirect()->route('pelaporan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $korbans = Korban::where('pelaporan_id', $id)->get();
        $pelaporan = Pelaporan::find($id);

        return view('pelaporan.show', compact('pelaporan', 'korbans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaporan = Pelaporan::find($id);
        $bencanas = Bencana::all();

        return view('pelaporan.edit', compact('pelaporan', 'bencanas'));
    }

    public function validasi($id)
    {
        Pelaporan::find($id)->update([
            'status' => 'diverifikasi'
        ]);

        return back();
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
            'bencana_id' => ['required'],
            'waktu_bencana' => ['required']
        ]);

        $data = $request->all();

        if ($request->file('file')) {
            $data['file'] = $request->file('file')->store('file', 'public');
        }

        Pelaporan::find($id)->update($data);

        return redirect()->route('pelaporan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelaporan::find($id)->delete();

        return back();
    }

    public function addKorban(Request $request)
    {
        Korban::create($request->all());

        return back();
    
    }

    public function deleteKorban($id)
    {
        Korban::find($id)->delete();

        return back();
    }
}
