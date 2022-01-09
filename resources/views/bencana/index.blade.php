@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Bencana
                </span>
                <span>
                    <a href="{{ route('bencana.create') }}" class="btn btn-primary">Tambah</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Bencana</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bencanas as $item)
                            <tr>
                                <th>
                                    {{$item->nama}}
                                </th>
                                <td>
                                    {{$item->kategori->nama}}
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('bencana.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('bencana.destroy', $item->id) }}" method="post">
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