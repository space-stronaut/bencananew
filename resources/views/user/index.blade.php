@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    User
                </span>
                <span>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Buat User</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <th>
                                    {{$item->name}}
                                </th>
                                <th>
                                    {{$item->role->nama}}
                                </th>
                                <th>
                                    {{$item->email}}
                                </th>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection