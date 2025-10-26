<h1>Tambah Mahasiswa Baru</h1>
<a href="{{ route('mahasiswa.index')}}">Kembali</a>

@if ($errors->any())
    <div>
        <strong>Whoops!</strong> Ada masalah dengan input anda. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <div>
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" placeholder="NIM">
    </div>

    <div>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" placeholder="Nama"> 
    </div>

    <div>
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan">
    </div>

     <div>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" placeholder="Alamat">
    </div>

    <button type="submit">Simpan</button>
</form>