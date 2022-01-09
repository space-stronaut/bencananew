@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Kategori
                </span>
                <span>
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $item)
                            <tr>
                                <th>
                                    {{$item->nama}}
                                </th>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
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