<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
</head>
<body>
<h2>Daftar Transaksi</h2>
<a href="{{ route('transactions.create') }}">Tambah Transaksi</a>
<a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jenis</th>
        <th>Jumlah</th>
        <th>Tanggal</th>
    </tr>
    @foreach($transactions as $tr)
    <tr>
        <td>{{ $tr->id }}</td>
        <td>{{ $tr->item->name }}</td>
        <td>{{ $tr->type }}</td>
        <td>{{ $tr->quantity }}</td>
        <td>{{ $tr->date }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>