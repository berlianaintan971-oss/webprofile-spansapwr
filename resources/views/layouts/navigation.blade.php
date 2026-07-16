<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">

    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-nav-link>

    <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.*')">
        Berita
    </x-nav-link>

    <x-nav-link :href="route('guru.index')" :active="request()->routeIs('guru.*')">
        Guru
    </x-nav-link>

    <div class="hidden sm:flex sm:items-center">
        <x-dropdown align="left" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-1 py-2 border border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 {{ request()->routeIs('sejarah.*') || request()->routeIs('visi-misi.*') || request()->routeIs('struktur-organisasi.*') || request()->routeIs('fasilitas.*') ? 'text-gray-900 font-semibold border-b-2 border-indigo-400' : '' }}">
                    <div>Manajemen Profil</div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('sejarah.index')">
                    Sejarah Sekolah
                </x-dropdown-link>
                <x-dropdown-link :href="route('visi-misi.index')">
                    Visi & Misi
                </x-dropdown-link>
                <x-dropdown-link :href="route('struktur-organisasi.index')">
                    Struktur Organisasi
                </x-dropdown-link>
                <x-dropdown-link :href="route('fasilitas.index')">
                    Fasilitas Sekolah
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </div>

    <x-nav-link :href="route('akreditasi.index')" :active="request()->routeIs('akreditasi.*')">
        Akreditasi
    </x-nav-link>

    <x-nav-link :href="route('ppdb.index')" :active="request()->routeIs('ppdb.*')">
        PPDB
    </x-nav-link>

</div>