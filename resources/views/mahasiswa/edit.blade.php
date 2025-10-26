<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">

<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">

    @csrf
    @method('PUT') 

    <div>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" placeholder="NIM">
    </div>

    <div>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="Nama" value="{{ $mahasiswa->nama }}" placeholder="Nama"> 
    </div>

    <div>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="Jurusan" value="{{ $mahasiswa->jurusan }}" placeholder="Jurusan">
    </div>
    
    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" id="alamat" value="{{ $mahasiswa->alamat }}" placeholder="Alamat">
    </div>
    <button type="submit">Perbarui</button>

</form>