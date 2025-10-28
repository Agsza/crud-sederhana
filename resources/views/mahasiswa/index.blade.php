@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Daftar Mahasiswa</h1>
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th width="280px">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama}}</td>
            <td>{{ $mahasiswa->jurusan}}</td>
            <td>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="d-inline">
                    <a class="btn btn-info btn-sm text-white" href="{{ route('mahasiswa.show', $mahasiswa->id) }}">Detail</a>
                    <a class="btn btn-primary btn-sm" href="{{route('mahasiswa.edit', $mahasiswa->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{-- Memastikan pagination menggunakan styling Bootstrap --}}
    {!! $mahasiswas->links('pagination::bootstrap-5') !!} 
</div>

@endsection