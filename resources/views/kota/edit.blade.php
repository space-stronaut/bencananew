@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Kota
                </span>
                <span>
                    <a href="{{ route('kota.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('kota.update', $kota->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{ $kota->nama }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi_id" id="" class="form-control">
                            <option value="">Pilih Provinsi...</option>
                            @foreach ($provinsis as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $kota->provinsi_id ? 'selected' : '' }}>{{ $item->nama }}</option>
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