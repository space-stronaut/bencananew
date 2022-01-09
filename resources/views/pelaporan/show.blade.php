@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Detail
                </span>
                <span>
                    <a href="{{ route('pelaporan.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <center>
                    <img src="{{ Storage::url($pelaporan->file) }}" width="300" alt="">
                </center>
                <table style="width : 100%">
                    <tr>
                        <th>Pelapor</th>
                        <th>:</th>
                        <td>
                            {{$pelaporan->user->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>Waktu bencana</th>
                        <th>:</th>
                        <td>
                            {{ Carbon\Carbon::parse($pelaporan->waktu_bencana)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                            {{$pelaporan->status}}
                        </td>
                    </tr>
                    <tr>
                        <th>Bencana</th>
                        <th>:</th>
                        <td>
                            {{$pelaporan->bencana->nama}}
                        </td>
                    </tr>
                    @if (Auth::user()->role->nama == 'admin' && $pelaporan->status == 'proses')
                    <tr>
                        <th>
                            <a href="{{ route('pelaporan.verifikasi', $pelaporan->id) }}" class="btn btn-success">Verifikasi</a>
                        </th>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
                Add Korban
            </div>
            <div class="card-body">
                <form action="{{ route('pelaporan.addKorban') }}" method="post">
                    @csrf
                    <input type="hidden" name="pelaporan_id" value="{{ $pelaporan->id }}">
                    <div class="form-group">
                        <label for="">Nama Korban</label>
                        <input type="text" name="nama" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="number" name="umur" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Kondisi</label>
                        <input type="text" name="kondisi" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="number" name="nik" class="form-control" id="">
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Submit" class="btn btn-success" id="">
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                Daftar Korban
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Kondisi</th>
                            <th>NIK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($korbans as $item)
                            <tr>
                                <td>
                                    {{$item->nama}}
                                </td>
                                <td>
                                    {{$item->umur}}
                                </td>
                                <td>
                                    {{$item->kondisi}}
                                </td>
                                <td>
                                    {{$item->nik}}
                                </td>
                                <td>
                                    <a href="{{ route('pelaporan.deleteKorban', $item->id) }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection