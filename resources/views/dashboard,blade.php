<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - Monitoring Barang</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        a { display: inline-block; margin: 10px; padding: 10px 15px; background: #007BFF; color: #fff; text-decoration: none; border-radius: 4px; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard Admin</h2>
        <a href="{{ route('items.index') }}">Kelola Barang</a>
        <a href="{{ route('transactions.index') }}">Kelola Transaksi</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>
</body>
</html>