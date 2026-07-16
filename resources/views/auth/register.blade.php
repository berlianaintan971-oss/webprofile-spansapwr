<x-guest-layout>
    <div class="text-center mb-4">
        <h3 class="text-lg font-bold text-slate-800 tracking-tight">Daftar Akun Baru</h3>
        <p class="text-[11px] text-slate-500">Sistem Informasi Akademik SPENSA</p>
    </div>

    @if ($errors->any())
        <div class="mb-3 p-2 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
            <ul class="list-disc list-inside text-[11px] text-red-600 space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <div class="space-y-0.5">
            <x-input-label for="name" class="font-semibold text-slate-700 text-[11px] uppercase tracking-wider" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block w-full rounded-lg border-slate-200 px-3 py-1.5 text-xs focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50" 
                          type="text" name="name" :value="old('name')" required autofocus placeholder="Nama lengkap Anda" />
        </div>

        <div class="space-y-0.5">
            <x-input-label for="email" class="font-semibold text-slate-700 text-[11px] uppercase tracking-wider" :value="__('Alamat Email')" />
            <x-text-input id="email" class="block w-full rounded-lg border-slate-200 px-3 py-1.5 text-xs focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50" 
                          type="email" name="email" :value="old('email')" required placeholder="nama@email.com" />
        </div>

        <div class="space-y-0.5">
            <x-input-label for="password" class="font-semibold text-slate-700 text-[11px] uppercase tracking-wider" :value="__('Password')" />
            <x-text-input id="password" class="block w-full rounded-lg border-slate-200 px-3 py-1.5 text-xs focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50"
                          type="password" name="password" required placeholder="••••••••" autocomplete="new-password" />
        </div>

        <div class="space-y-0.5">
            <x-input-label for="password_confirmation" class="font-semibold text-slate-700 text-[11px] uppercase tracking-wider" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block w-full rounded-lg border-slate-200 px-3 py-1.5 text-xs focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50"
                          type="password" name="password_confirmation" required placeholder="••••••••" autocomplete="new-password" />
        </div>

        <div class="space-y-0.5">
            <div class="flex items-center justify-between">
                <x-input-label for="kode_registrasi" class="font-semibold text-slate-700 text-[11px] uppercase tracking-wider" :value="__('Kode Registrasi Khusus')" />
                <span class="text-[10px] text-amber-600 font-medium"><i class="bi bi-info-circle"></i> Internal</span>
            </div>
            <x-text-input id="kode_registrasi" class="block w-full rounded-lg border-slate-200 px-3 py-1.5 text-xs focus:border-blue-600 focus:ring-blue-600 focus:ring-1 transition bg-slate-50"
                          type="text" name="kode_registrasi" :value="old('kode_registrasi')" required placeholder="Masukkan kode internal..." />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-lg tracking-wide shadow-md transition cursor-pointer">
                {{ __('DAFTAR & MASUK SISTEM') }}
            </button>
        </div>

        <div class="text-center pt-3 border-t border-slate-100 flex items-center justify-center gap-1.5 text-xs">
            <span class="text-slate-500">Sudah memiliki akun?</span>
            <a class="font-bold text-blue-600 hover:text-blue-800 transition" href="{{ route('login') }}">
                {{ __('Masuk (Login)') }}
            </a>
        </div>
    </form>
</x-guest-layout>