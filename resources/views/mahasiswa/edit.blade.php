@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Edit Mahasiswa</h2>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" class="border border-default col-md-6 p-2">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nim">Nim:</label>
                <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" readonly>
                @error('nim')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="angkatan">Angkatan:</label>
                <input type="number" name="angkatan" id="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
                @error('angkatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan">Jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}">
                @error('jurusan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
            <a class="btn btn-secondary" href="{{ route('mahasiswa.index') }}">Kembali</a>
        </form>
    </div>
@endsection
