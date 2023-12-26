@extends ('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
        <div class="col-md-12 mb-3">
            <h2>Daftar Mahasiswa</h2>
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">
                Tambah Mahasiswa
            </a>
            </div>
        </div>

       @if ($message=Session::get ('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>#</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Angkatan</th>
        <th>Jurusan</th>
    </tr>
    @foreach ($data_mahasiswa as $key =>$mahasiswa)
        <tr>
            <td>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="post">
                     <a class="btn btn-primary" href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}">
                        Edit
                    </a>

                    @csrf
                    @method ("DELETE")
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Hapus data NIM:{{$mahasiswa->nim}}?')">
                        Delete
                    </button>|

                </form>
            </td>
            <td>{{$mahasiswa->nim}}  </td>
            <td>{{ $mahasiswa->nama}}</td>
            <td>{{$mahasiswa->angkatan}}</td>
            <td>{{$mahasiswa->jurusan}}</td>
        </tr>
    @endforeach
    </table>

    Halaman : {{ $data_mahasiswa->currentPage()}} <br/>
    Jumlah Data : {{ $data_mahasiswa->total() }} <br/>
    Data Per Halaman : {{ $data_mahasiswa->perPage()}} <br/>
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $data_mahasiswa->links() !!}
    </div>
    </div>
@endsection
