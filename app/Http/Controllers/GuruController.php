<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Tampilkan semua data guru
     */
    public function index()
    {
        $guru = Guru::latest()->paginate(10);

        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Simpan data guru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
            'foto.image' => 'File harus berupa gambar',
        ]);

        $foto = null;

        // Upload foto
        if ($request->hasFile('foto')) {

            $foto = time() . '_' .
                $request->foto->getClientOriginalName();

            $request->foto->move(
                public_path('foto_guru'),
                $foto
            );
        }

        // Simpan data
        Guru::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan');
    }

    /**
     * Form edit guru
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update data guru
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'kategori' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $guru->foto;

        // Upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (
                $guru->foto &&
                file_exists(
                    public_path('foto_guru/' . $guru->foto)
                )
            ) {

                unlink(
                    public_path('foto_guru/' . $guru->foto)
                );
            }

            // Upload foto baru
            $foto = time() . '_' .
                $request->foto->getClientOriginalName();

            $request->foto->move(
                public_path('foto_guru'),
                $foto
            );
        }

        // Update data
        $guru->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    /**
     * Hapus data guru
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto
        if (
            $guru->foto &&
            file_exists(
                public_path('foto_guru/' . $guru->foto)
            )
        ) {

            unlink(
                public_path('foto_guru/' . $guru->foto)
            );
        }

        // Hapus data
        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus');
    }
}