<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Menampilkan semua berita
     */
    public function index()
    {
        $berita = Berita::latest()->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    /**
     * Menampilkan form tambah berita
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Menyimpan berita baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required' => 'Judul wajib diisi',
            'isi.required' => 'Isi berita wajib diisi',
            'gambar.image' => 'File harus berupa gambar',
        ]);

        $gambar = null;

        // Upload gambar
        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->move(
                public_path('gambar_berita'),
                $gambar
            );
        }

        // Simpan berita
        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Menampilkan detail berita
     */
    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Menampilkan form edit berita
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * Update berita
     */
    public function update(Request $request, string $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambar = $berita->gambar;

        // Jika upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($berita->gambar &&
                file_exists(public_path(
                    'gambar_berita/' . $berita->gambar
                ))) {

                unlink(public_path(
                    'gambar_berita/' . $berita->gambar
                ));
            }

            // Upload gambar baru
            $gambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->move(
                public_path('gambar_berita'),
                $gambar
            );
        }

        // Update data
        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'gambar' => $gambar,
        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Hapus berita
     */
    public function destroy(string $id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar
        if ($berita->gambar &&
            file_exists(public_path(
                'gambar_berita/' . $berita->gambar
            ))) {

            unlink(public_path(
                'gambar_berita/' . $berita->gambar
            ));
        }

        // Hapus data
        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}