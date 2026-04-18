<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
<h2>Daftar Barang</h2>
<a href="{{ route('items.create') }}">Tambah Barang</a>
<a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->stock }}</td>
        <td>
            <a href="{{ route('items.edit', $item->id) }}">Edit</a>
            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>