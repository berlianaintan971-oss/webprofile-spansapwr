<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    /**
     * TAMPILAN DEPAN UNTUK PENGGUNA BBIASA / GUEST
     * Mengatasi Error 404 Not Found di halaman utama
     */
    public function showGuest()
    {
        // Ambil data akreditasi pertama dari database
        $akreditasi = Akreditasi::first();

        // Mengarahkan ke file view depan (buat file ini jika belum ada, misal: resources/views/akreditasi.blade.php)
        return view('akreditasi', compact('akreditasi'));
    }

    /**
     * TAMPILAN PANEL ADMIN
     */
    public function index()
    {
        $akreditasi = Akreditasi::first();

        return view(
            'admin.akreditasi.index',
            compact('akreditasi')
        );
    }

    /**
     * PROSES UPDATE DATA DARI ADMIN
     */
    public function update(Request $request)
    {
        $request->validate([
            'nilai_akreditasi' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'foto_sertifikat' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $akreditasi = Akreditasi::first();

        if (!$akreditasi) {
            $akreditasi = new Akreditasi();
        }

        if ($request->hasFile('foto_sertifikat')) {

            if (
                $akreditasi->foto_sertifikat &&
                file_exists(
                    public_path(
                        'foto_akreditasi/' .
                        $akreditasi->foto_sertifikat
                    )
                )
            ) {
                unlink(
                    public_path(
                        'foto_akreditasi/' .
                        $akreditasi->foto_sertifikat
                    )
                );
            }

            $namaFile = time() . '.' .
                $request->foto_sertifikat->extension();

            $request->foto_sertifikat->move(
                public_path('foto_akreditasi'),
                $namaFile
            );

            $akreditasi->foto_sertifikat = $namaFile;
        }

        $akreditasi->nilai_akreditasi = $request->nilai_akreditasi;
        $akreditasi->tahun = $request->tahun;
        $akreditasi->deskripsi = $request->deskripsi;
        $akreditasi->save();

        return redirect()
            ->route('akreditasi.index')
            ->with('success', 'Data akreditasi berhasil diperbarui');
    }
}