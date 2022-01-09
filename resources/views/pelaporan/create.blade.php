@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Pelaporan
                </span>
                <span>
                    <a href="{{ route('pelaporan.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('pelaporan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="status" value="proses">
                    <div class="form-group">
                        <label for="">Bencana</label>
                        <select name="bencana_id" id="" class="form-control">
                            <option value="">Pilih Bencana...</option>
                            @foreach ($bencanas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Waktu Bencana</label>
                        <input type="date" name="waktu_bencana" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Foto Pendukung</label>
                        <input type="file" name="file" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success mt-2">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection