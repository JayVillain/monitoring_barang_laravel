<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
<h2>Edit Barang</h2>
<a href="{{ route('items.index') }}">Kembali ke Daftar Barang</a>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Barang</label><br>
    <input type="text" name="name" value="{{ $item->name }}" required><br>
    <label>Deskripsi</label><br>
    <textarea name="description">{{ $item->description }}</textarea><br>
    <label>Stok</label><br>
    <input type="number" name="stock" value="{{ $item->stock }}" required><br><br>
    <button type="submit">Update</button>
</form>
</body>
</html>