<x-app-layout>

    <div class="p-6 max-w-6xl mx-auto">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900 leading-tight">Visi & Misi Sekolah</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola data visi dan misi resmi sekolah untuk halaman informasi publik.</p>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl shadow-sm flex items-center justify-between">
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

            <form action="{{ route('visi-misi.update') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="visi" class="block text-sm font-semibold text-gray-700 mb-2">Visi Sekolah</label>
                    <textarea 
                        id="visi"
                        name="visi" 
                        rows="5" 
                        class="w-full border border-gray-200 rounded-xl p-4 text-sm text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-inner"
                        placeholder="Tuliskan visi utama sekolah di sini...">{{ old('visi', $visiMisi->visi ?? '') }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="misi" class="block text-sm font-semibold text-gray-700 mb-2">Misi Sekolah</label>
                    <textarea 
                        id="misi"
                        name="misi" 
                        rows="10" 
                        class="w-full border border-gray-200 rounded-xl p-4 text-sm text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition shadow-inner"
                        placeholder="Tuliskan poin-poin misi sekolah di sini...">{{ old('misi', $visiMisi->misi ?? '') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1.5 font-medium">💡 Gunakan tombol Enter untuk membuat baris atau poin baru bagi misi sekolah.</p>
                </div>

                <button type="submit" class="inline-flex justify-center items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-sm hover:shadow transition cursor-pointer">
                    Simpan Perubahan Data
                </button>

            </form>

        </div>

    </div>

</x-app-layout>