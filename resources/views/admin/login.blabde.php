<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - Monitoring Barang</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 400px; margin: 100px auto; padding: 20px; background: #fff; border-radius: 6px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input { width: 100%; padding: 8px; margin: 8px 0; }
        button { padding: 10px 15px; background: #007BFF; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Admin</h2>
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>