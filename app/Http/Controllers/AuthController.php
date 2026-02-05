<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show Admin Login Form (Concealed at /panel-desa/masuk)
     */
    public function showAdminLogin()
    {
        return view('pages.auth.admin-login');
    }

    /**
     * Handle Admin Login
     */
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required|string|size:16',
            'password' => 'required|string|min:6',
        ], [
            'nik.required' => 'NIK wajib diisi',
            'nik.size' => 'NIK harus 16 digit',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        // Attempt login
        if (Auth::attempt(['nik' => $credentials['nik'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            $user = Auth::user();

            // Check if user is admin role
            if (!$user->isAdmin()) {
                Auth::logout();
                return back()->withErrors([
                    'nik' => 'Anda tidak memiliki akses ke panel admin.',
                ])->onlyInput('nik');
            }

            // Check if account is active
            if (!$user->is_active) {
                Auth::logout();
                return back()->withErrors([
                    'nik' => 'Akun Anda tidak aktif. Hubungi administrator.',
                ])->onlyInput('nik');
            }

            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'nik' => 'NIK atau password salah.',
        ])->onlyInput('nik');
    }

    /**
     * Handle Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
