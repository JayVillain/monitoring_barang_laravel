<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $admin = Admin::where('email', $request->email)->first();
        if($admin && Hash::check($request->password, $admin->password)){
            session(['admin_id' => $admin->id]);
            return redirect()->route('dashboard');
        }
        return back()->with('error', 'Email atau password salah');
    }

    public function logout() {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}