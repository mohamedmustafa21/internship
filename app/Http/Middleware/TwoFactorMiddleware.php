<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // لو اليوزر مش عامل لوجين → رجعه على صفحة اللوجين
        if (!$user) {
            return redirect()->route('login');
        }

        // لو لسه عنده كود 2FA متخزن → رجعه لصفحة إدخال الكود
        if ($user->two_factor_code && $user->two_factor_expires_at && $user->two_factor_expires_at->isFuture()) {
            return redirect()->route('twofactor.index');
        }

        return $next($request);
    }
}
