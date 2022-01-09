@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Kecamatan
                </span>
                <span>
                    <a href="{{ route('kecamatan.create') }}" class="btn btn-primary">Tambah</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Kecamatan</th>
                            <th>Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatans as $item)
                            <tr>
                                <th>
                                    {{$item->nama}}
                                </th>
                                <td>
                                    {{$item->kota->nama}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('kecamatan.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('kecamatan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection