<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use App\Models\VisiMisi; // Sesuaikan dengan nama model VisiMisi Anda yang sudah ada
use App\Models\StrukturOrganisasi;
use App\Models\Fasilitas;

class ProfilManagementController extends Controller
{
    // 1. SEJARAH
    public function editSejarah() {
        $data = Sejarah::first() ?? new Sejarah();
        return view('admin.profil.sejarah', compact('data'));
    }
    public function updateSejarah(Request $request) {
        $request->validate(['konten' => 'required']);
        Sejarah::updateOrCreate(['id' => 1], ['konten' => $request->konten]);
        return redirect()->back()->with('success', 'Sejarah sekolah berhasil diperbarui!');
    }

    // 2. VISI MISI (Menghubungkan ke tabel yang sudah Anda miliki)
    public function editVisiMisi() {
        $data = VisiMisi::first() ?? new VisiMisi();
        return view('admin.profil.visi-misi', compact('data'));
    }
    public function updateVisiMisi(Request $request) {
        $request->validate(['konten' => 'required']);
        VisiMisi::updateOrCreate(['id' => 1], ['konten' => $request->konten]);
        return redirect()->back()->with('success', 'Visi & Misi berhasil diperbarui!');
    }

    // 3. STRUKTUR ORGANISASI
    public function editStruktur() {
        $data = StrukturOrganisasi::first() ?? new StrukturOrganisasi();
        return view('admin.profil.struktur', compact('data'));
    }
    public function updateStruktur(Request $request) {
        $request->validate(['konten' => 'required']);
        StrukturOrganisasi::updateOrCreate(['id' => 1], ['konten' => $request->konten]);
        return redirect()->back()->with('success', 'Struktur Organisasi berhasil diperbarui!');
    }

    // 4. FASILITAS
    public function editFasilitas() {
        $data = Fasilitas::first() ?? new Fasilitas();
        return view('admin.profil.fasilitas', compact('data'));
    }
    public function updateFasilitas(Request $request) {
        $request->validate(['konten' => 'required']);
        Fasilitas::updateOrCreate(['id' => 1], ['konten' => $request->konten]);
        return redirect()->back()->with('success', 'Fasilitas Sekolah berhasil diperbarui!');
    }
}