@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Edit Data Mahasiswa</h1>
            <a class="btn btn-secondary" href="{{ route('mahasiswa.index')}}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan input anda. <br><br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT') 

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nim" class="form-label">NIM:</label>
            <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" class="form-control" placeholder="NIM">
        </div>

        <div class="col-md-6 mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" class="form-control" placeholder="Nama"> 
        </div>

        <div class="col-md-6 mb-3">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}" class="form-control" placeholder="Jurusan">
        </div>
        
        <div class="col-md-12 mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            {{-- Mengubah input text menjadi textarea untuk alamat --}}
            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" rows="3">{{ $mahasiswa->alamat }}</textarea>
        </div>
        
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
    </div>

</form>

@endsection