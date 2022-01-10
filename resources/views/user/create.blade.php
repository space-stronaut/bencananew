@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    User
                </span>
                <span>
                    <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nama" class="form-control">
                    </div>
                    @error('name')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <input type="email" name="email"  placeholder="Email" class="form-control">
                    </div>
                    @error('email')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <input type="password" name="password"  placeholder="Password" class="form-control">
                    </div>
                    @error('password')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <input type="date" name="tgl_lahir"  placeholder="Alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="role_id" id="" class="form-control">
                            <option value="">Pilih Role</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kecamatan_id" id="" class="form-control">
                            <option value="">Pilih Kecamatan</option>
                            @foreach (App\Models\Kecamatan::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection