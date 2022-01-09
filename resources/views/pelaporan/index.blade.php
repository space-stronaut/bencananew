@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Pelaporan
                </span>
                <span>
                    <a href="{{ route('pelaporan.create') }}" class="btn btn-primary">Tambah</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Bencana</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelaporans as $item)
                            <tr>
                                <th>
                                    {{$item->user->name}}
                                </th>
                                <td>
                                    {{ Carbon\Carbon::parse($item->waktu_bencana)->format('d M Y') }}
                                </td>
                                <td>
                                    {{$item->bencana->nama}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('pelaporan.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('pelaporan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                    <a href="{{ route('pelaporan.show', $item->id) }}" class="btn btn-info ms-2">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection