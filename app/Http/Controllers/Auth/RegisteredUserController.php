<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input Form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'kode_registrasi' => ['required', 'string'],
        ]);

        // 2. Validasi Logika "Kode Registrasi Khusus" Internal Sekolah
        // Anda bisa mengganti 'SPENSA2026' dengan kode rahasia apa saja yang Anda inginkan
        if ($request->kode_registrasi !== 'SMPN11942') {
            return back()->withErrors([
                'kode_registrasi' => 'Kode Registrasi Khusus yang Anda masukkan salah atau tidak terdaftar!'
            ])->withInput();
        }

        // 3. Buat Data User Baru ke Database jika kode benar
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // 4. Otomatis Login dan Arahkan ke Dashboard Admin Sekolah
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}