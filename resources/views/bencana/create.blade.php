@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Bencana
                </span>
                <span>
                    <a href="{{ route('bencana.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('bencana.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" id="" class="form-control">
                            <option value="">Pilih Kategori...</option>
                            @foreach ($kategoris as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
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