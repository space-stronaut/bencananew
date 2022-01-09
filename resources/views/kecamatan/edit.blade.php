@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Kecamatan
                </span>
                <span>
                    <a href="{{ route('kecamatan.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{ $kecamatan->nama }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kota</label>
                        <select name="kota_id" id="" class="form-control">
                            <option value="">Pilih Kota...</option>
                            @foreach ($kotas as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $kecamatan->kota_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success mt-2">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection