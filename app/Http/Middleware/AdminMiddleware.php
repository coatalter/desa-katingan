<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('admin.login');
        }

        // Allow admin roles: kepala_desa, sekretaris, kaur_*, admin, petugas
        $adminRoles = ['kepala_desa', 'sekretaris', 'kaur_pemerintahan', 'kaur_keuangan', 'kaur_umum', 'admin', 'petugas'];

        if (!in_array($user->role, $adminRoles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        if (!$user->is_active) {
            \Illuminate\Support\Facades\Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Akun Anda tidak aktif.');
        }

        return $next($request);
    }
}
