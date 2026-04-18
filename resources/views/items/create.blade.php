<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
<h2>Tambah Barang</h2>
<a href="{{ route('items.index') }}">Kembali ke Daftar Barang</a>

<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <label>Nama Barang</label><br>
    <input type="text" name="name" required><br>
    <label>Deskripsi</label><br>
    <textarea name="description"></textarea><br>
    <label>Stok</label><br>
    <input type="number" name="stock" value="0" required><br><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>