<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk melindungi akses ke data detail siswa
 * Memastikan user hanya akses data dirinya sendiri
 */
class StudentAccessMiddleware
{
    /**
     * Handle an incoming request.
     * 
     * Usage di route: middleware('student.access:id')
     * 
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $paramName = 'id'): Response
    {
        $requestedId = $request->route($paramName);
        
        // ✅ Ambil student_id dari 2 sumber session
        $sessionStudentId = session('ppdb_student_id') ?? session('ppdb_session_id');
        
        // ✅ Jika request ID adalah session_id (string UUID) - format lama
        if ($sessionStudentId && $sessionStudentId === $requestedId) {
            return $next($request);
        }

        // ✅ Jika request ID adalah student database ID - setelah submit dokumen
        if (session('ppdb_student_id') && session('ppdb_student_id') == $requestedId) {
            return $next($request);
        }

        // ❌ ID tidak cocok dengan session atau tidak ada session
        return response()->view('errors.unauthorized', [], 403);
    }
}