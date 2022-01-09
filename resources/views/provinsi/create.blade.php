@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Provinsi
                </span>
                <span>
                    <a href="{{ route('provinsi.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success mt-2">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection