<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use Illuminate\Http\Request;

class KepalaSekolahController extends Controller
{
    public function index()
    {
        $kepalaSekolah = KepalaSekolah::first();

        return view(
            'admin.kepala-sekolah.index',
            compact('kepalaSekolah')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'sambutan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kepalaSekolah = KepalaSekolah::first();

        if (!$kepalaSekolah) {
            $kepalaSekolah = new KepalaSekolah();
        }

        if ($request->hasFile('foto')) {

            if (
                $kepalaSekolah->foto &&
                file_exists(public_path('foto_kepsek/' . $kepalaSekolah->foto))
            ) {
                unlink(public_path('foto_kepsek/' . $kepalaSekolah->foto));
            }

            $namaFoto = time() . '.' . $request->foto->extension();

            $request->foto->move(
                public_path('foto_kepsek'),
                $namaFoto
            );

            $kepalaSekolah->foto = $namaFoto;
        }

        $kepalaSekolah->nama = $request->nama;
        $kepalaSekolah->sambutan = $request->sambutan;

        $kepalaSekolah->save();

        return redirect()
            ->route('kepala-sekolah.index')
            ->with('success', 'Data berhasil diperbarui');
    }
}