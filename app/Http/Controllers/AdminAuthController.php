<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm() {
        return view('admin.login'); // pastikan login.blade.php ada di resources/views/admin/
    }

    // Proses login admin pakai username
    public function login(Request $request) {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Ambil admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        if($admin && Hash::check($request->password, $admin->password)){
            // Simpan session admin
            session(['admin_id' => $admin->id]);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    // Logout admin
    public function logout() {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}