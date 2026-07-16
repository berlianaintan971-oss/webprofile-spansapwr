<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::first() ?? new StrukturOrganisasi();

        return view('admin.struktur.index', compact('struktur'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'konten' => 'required',
            'foto'   => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ]);

        $struktur = StrukturOrganisasi::find(1);

        $foto = $struktur ? $struktur->foto : null;

        if ($request->hasFile('foto')) {

            // Hapus file lama
            if (
                $struktur &&
                $struktur->foto &&
                Storage::disk('public')->exists($struktur->foto)
            ) {
                Storage::disk('public')->delete($struktur->foto);
            }

            // Simpan file baru
            $foto = $request->file('foto')
                            ->store('struktur-organisasi', 'public');
        }

        StrukturOrganisasi::updateOrCreate(
            ['id' => 1],
            [
                'konten' => $request->konten,
                'foto'   => $foto,
            ]
        );

        return redirect()->back()->with(
            'success',
            'Data Struktur Organisasi berhasil diperbarui!'
        );
    }
}