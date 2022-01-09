@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Provinsi
                </span>
                <span>
                    <a href="{{ route('provinsi.create') }}" class="btn btn-primary">Tambah</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($provinsis as $item)
                            <tr>
                                <th>
                                    {{$item->nama}}
                                </th>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('provinsi.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('provinsi.destroy', $item->id) }}" method="post">
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