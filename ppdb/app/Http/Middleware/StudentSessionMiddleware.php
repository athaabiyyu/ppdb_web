<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk melindungi akses ke route PPDB form
 * Memastikan user hanya akses form dengan session_id yang valid
 */
class StudentSessionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Jika user masih dalam proses pendaftaran (belum submit dokumen)
        // Gunakan ppdb_session_id
        if (session('ppdb_session_id')) {
            return $next($request);
        }

        // ✅ Jika user sudah selesai pendaftaran (submit dokumen)
        // Gunakan ppdb_student_id
        if (session('ppdb_student_id')) {
            return $next($request);
        }

        // ❌ Jika tidak ada session sama sekali
        return redirect()->route('home')
            ->with('error', 'Silakan mulai pendaftaran dari awal');
    }
}