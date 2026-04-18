<!DOCTYPE html>
<html>
<head>
    <title>Tambah Transaksi</title>
</head>
<body>
<h2>Tambah Transaksi</h2>
<a href="{{ route('transactions.index') }}">Kembali ke Daftar Transaksi</a>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
    <label>Nama Barang</label><br>
    <select name="item_id" required>
        @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select><br>

    <label>Jenis Transaksi</label><br>
    <select name="type" required>
        <option value="masuk">Masuk</option>
        <option value="keluar">Keluar</option>
        <option value="kembali">Kembali</option>
    </select><br>

    <label>Jumlah</label><br>
    <input type="number" name="quantity" required><br>

    <label>Tanggal</label><br>
    <input type="date" name="date" value="{{ date('Y-m-d') }}" required><br><br>

    <button type="submit">Simpan</button>
</form>
</body>
</html>