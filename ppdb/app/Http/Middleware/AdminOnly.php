<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_id')) {
            return redirect('/admin/login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        return $next($request);
    }
}
