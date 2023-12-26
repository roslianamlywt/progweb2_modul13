@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h2>Tambah Mahasiswa</h2>
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST" class="border border-default col-md-6 p-2">
        @csrf

        <div class="mb-3">
            <label for="nim">Nim:</label>
            <input type="text" name="nim" id="nim" class="form-control">

            @error('nim')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control">

            @error('nama')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="angkatan">Angkatan:</label>
            <input type="text" name="angkatan" id="angkatan" class="form-control">
            @error('angkatan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control">
            @error('jurusan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="{{route('mahasiswa.index')}}">
            Kembali
        </a>
    </form>
</div>
@endsection
