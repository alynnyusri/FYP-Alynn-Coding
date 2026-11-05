<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login_id' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Cari pengguna berdasarkan ID dalam database
        $user = \App\Models\User::where(
            'login_id',
            $credentials['login_id']
        )->first();

        // Semak sama ada pengguna wujud dan password betul
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withErrors([
                    'login_id' => 'Incorrect ID or Password.',
                ])
                ->onlyInput('login_id');
        }

        if ($user && $user->status !== 'active') {
            return back()
                ->withErrors([
                    'login_id' => 'Your account has been deactivated. Please contact the administrator.',
                ])
                ->onlyInput('login_id');
        }

        // Log masuk pengguna
        Auth::login($user);
        $request->session()->regenerate();

        // Bawa pengguna ke dashboard berdasarkan role
        switch ($user->role) {
            case 'admin':
                return redirect('/admin/dashboards');

            case 'lecturer':
                return redirect('/lecturer/dashboards');

            case 'student':
                return redirect('/student/dashboards');

            default:
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect('/login')->withErrors([
                    'login_id' => 'Invalid account role. Please contact the administrator.',
                ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
