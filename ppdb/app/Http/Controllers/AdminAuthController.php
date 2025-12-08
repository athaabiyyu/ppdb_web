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

       public function logout(Request $request)
       {
              // Hapus semua data session
              $request->session()->flush();

              // Regenerasi session supaya aman
              $request->session()->regenerate();

              return redirect()->route('admin.login');
       }

       // Method untuk menampilkan form edit profile
       public function editProfile()
       {
              $admin = AdminUser::find(session('admin_id'));
              return view('admin.edit_profile', compact('admin'));
       }

       // Method untuk menyimpan perubahan username dan password
       public function updateProfile(Request $request)
       {
              $admin = AdminUser::find(session('admin_id'));

              $request->validate([
                     'username' => 'required|string|max:255|unique:admin_users,username,' . $admin->id,
                     'password' => 'nullable|string|min:6|confirmed'
              ]);

              $admin->username = $request->username;

              // Jika password diisi, update password
              if ($request->password) {
                     $admin->password = Hash::make($request->password);
              }

              $admin->save();

              return redirect()->route('admin.editProfile')->with('success', 'Profile berhasil diperbarui!');
       }
}
