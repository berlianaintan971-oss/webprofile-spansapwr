<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    /**
     * Menampilkan halaman form Sejarah
     */
    public function index()
    {
        // Ambil data pertama, jika belum ada buat object kosong
        $sejarah = Sejarah::first() ?? new Sejarah();

        return view('admin.sejarah.index', compact('sejarah'));
    }

    /**
     * Menyimpan atau memperbarui data Sejarah
     */
    public function update(Request $request)
    {
        $request->validate([
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'konten.required' => 'Isi sejarah wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format gambar harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Ambil data pertama
        $sejarah = Sejarah::first();

        // Jika belum ada data
        if (!$sejarah) {
            $sejarah = new Sejarah();
        }

        // Upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($sejarah->foto && Storage::disk('public')->exists($sejarah->foto)) {
                Storage::disk('public')->delete($sejarah->foto);
            }

            // Simpan foto baru
            $sejarah->foto = $request->file('foto')->store('sejarah', 'public');
        }

        // Simpan isi sejarah
        $sejarah->konten = $request->konten;

        $sejarah->save();

        return redirect()
            ->route('sejarah.index')
            ->with('success', 'Data sejarah sekolah berhasil disimpan.');
    }
}