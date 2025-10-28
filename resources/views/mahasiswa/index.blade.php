<!-- menambah komentar -->
<h1>Daftar Mahasiswa</h1>
<a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

@if($message = Session::get('success'))
<div>
    <p>{{ $message }}</p>
</div>
@endif


<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>jurusan</th>
        <th>aksi</th>
    </tr>

    @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama}}</td>
            <td>{{ $mahasiswa->jurusan}}</td>
            <td>
                <a href="{{ route('mahasiswa.index', $mahasiswa->id) }}">Detail</a>
                <a href="{{route('mahasiswa.edit', $mahasiswa->id)}}">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{!! $mahasiswas->links() !!}
