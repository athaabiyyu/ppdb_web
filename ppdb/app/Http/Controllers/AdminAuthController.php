<?php


namespace App\Http\Controllers;


use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
       public function loginForm()
       {
              // Jika sudah login, tidak boleh buka halaman login lagi
              if (session('admin_id')) {
                     return redirect('/admin/dashboard');
              }

              return view('admin.login');
       }

       public function login(Request $request)
       {
              $creds = $request->validate([
                     'username' => 'required',
                     'password' => 'required'
              ]);

              $user = AdminUser::where('username', $creds['username'])->first();

              if ($user && Hash::check($creds['password'], $user->password)) {
                     session(['admin_id' => $user->id]);

                     return redirect()->route('admin.dashboard');
              }

              return back()->withErrors(['username' => 'Username atau password salah!']);
       }

       public function logout()
       {
              session()->forget('admin_id');
              return redirect('/admin/login');
       }
}
