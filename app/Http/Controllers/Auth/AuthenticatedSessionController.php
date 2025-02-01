<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();// يتحقق من بيانات المستخدم

        $request->session()->regenerate();// يحمي الجلسة من الاختراقات

        $user = Auth::user(); // الحصول على المستخدم المسجل دخوله
        if ($user->role === 'student') {    
                return redirect()->route('student.dashboard');// توجيه الطالب للوحة التحكم الخاصة به
        }elseif ($user->role === 'supervisor') {
                return redirect()->route('supervisor.dashboard');// توجيه المشرف للوحة التحكم الخاصة به
        }

        return redirect()->intended(route('dashboard', absolute: false));// توجيه المستخدم العام للداشبورد
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();// تسجيل خروج المستخدم

        $request->session()->invalidate();// حذف الجلسة الحالية

        $request->session()->regenerateToken();// إعادة إنشاء CSRF Token لحماية الجلسة

        return redirect('/');// إعادة توجيه المستخدم إلى الصفحة الرئيسية
    }
}
