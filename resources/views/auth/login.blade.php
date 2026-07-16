<x-guest-layout>
    <div class="text-center mb-5">
        <h3 class="text-xl font-bold text-slate-800 tracking-tight">Portal Akses Masuk</h3>
        <p class="text-xs text-slate-500 mt-1">SMP Negeri 1 Purworejo</p>
    </div>

    <x-auth-session-status class="mb-4 text-sm text-red-600 font-medium text-center" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div class="space-y-1">
            <x-input-label for="email" class="font-semibold text-slate-700 text-xs uppercase tracking-wider" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block w-full rounded-xl border-slate-200 px-4 py-2.5 text-sm focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50" 
                          type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
        </div>

        <div class="space-y-1">
            <div class="flex items-center justify-between">
                <x-input-label for="password" class="font-semibold text-slate-700 text-xs uppercase tracking-wider" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-medium text-blue-600 hover:text-blue-800 transition" href="{{ route('password.request') }}">
                        {{ __('Lupa sandi?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" class="block w-full rounded-xl border-slate-200 px-4 py-2.5 text-sm focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50"
                          type="password" name="password" required placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-xs text-slate-600 group-hover:text-slate-800 select-none">{{ __('Ingat perangkat ini') }}</span>
            </label>
        </div>

        <div class="pt-3">
            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-bold rounded-xl tracking-wide shadow-md transition duration-150 ease-in-out cursor-pointer">
                {{ __('Masuk ke Sistem') }}
            </button>
        </div>

        <div class="text-center pt-4 border-t border-slate-100 flex items-center justify-center gap-2 text-xs mt-2">
            <span class="text-slate-500">Belum memiliki akses?</span>
            <a class="font-bold text-blue-600 hover:text-blue-800 transition" href="{{ route('register') }}">
                {{ __('Daftar Akun') }}
            </a>
        </div>
    </form>
</x-guest-layout>