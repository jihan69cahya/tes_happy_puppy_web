<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function doLogin(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json('Email tidak terdaftar', 401);
            }

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ])) {
                return response()->json([
                    'message' => 'Berhasil Login!',
                    'route'   => route('dashboard.index'),
                ], 200);
            }

            return response()->json('Password salah', 400);
        } catch (\Throwable $e) {
            Log::error('Login Error', [
                'email' => $request->email ?? null,
                'error' => $e->getMessage(),
                'file'  => $e->getFile(),
                'line'  => $e->getLine(),
            ]);

            return response()->json('Terjadi kesalahan, coba lagi nanti', 500);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Berhasil Logout');
    }
}
