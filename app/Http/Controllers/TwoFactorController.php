<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.twofactor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|digits:6',
        ]);

        $userId = session('2fa:user:id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('site.login')->with('error', 'Session expired. Please login again.');
        }

        // التحقق من الكود وصلاحيته
        if ($user->two_factor_code &&
            $user->two_factor_expires_at &&
            $request->two_factor_code == $user->two_factor_code &&
            $user->two_factor_expires_at->gt(now())) {

            // إعادة تعيين الكود
            $user->resetTwoFactorCode();

            // تسجيل دخول رسمي باستخدام الـ guard
            auth()->guard('web')->login($user);

            // حذف السيشن المؤقت
            session()->forget('2fa:user:id');

            // توجيه الـ admin مباشرة للـ dashboard
            return redirect()->route('admin.dashboard')->with('success', 'You are logged in!');
        }

        return redirect()->back()->with('error', 'The provided 2FA code is invalid or expired.');
    }
}
