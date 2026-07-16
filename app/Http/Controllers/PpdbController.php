<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * FUNGSI HALAMAN DEPAN / PUBLIK (GUEST)
     * Tambahkan fungsi ini agar halaman depan bisa membaca datanya secara dinamis
     */
    public function showGuest()
    {
        $ppdb = Ppdb::first();
        
        // Mengarahkan ke file resources/views/frontend/ppdb.blade.php
        return view('frontend.ppdb', compact('ppdb'));
    }

    /**
     * TAMPILAN PANEL ADMIN
     */
    public function index()
    {
        $ppdb = Ppdb::first();

        return view(
            'admin.ppdb.index',
            compact('ppdb')
        );
    }

    /**
     * PROSES UPDATE DATA DARI ADMIN
     */
    public function update(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $ppdb = Ppdb::first();

        if (!$ppdb) {
            $ppdb = new Ppdb();
        }

        if ($request->hasFile('banner')) {

            if (
                $ppdb->banner &&
                file_exists(
                    public_path('banner_ppdb/' . $ppdb->banner)
                )
            ) {
                unlink(
                    public_path('banner_ppdb/' . $ppdb->banner)
                );
            }

            $namaFile =
                time() . '.' .
                $request->banner->extension();

            $request->banner->move(
                public_path('banner_ppdb'),
                $namaFile
            );

            $ppdb->banner = $namaFile;
        }

        $ppdb->save();

        return redirect()
            ->route('ppdb.index')
            ->with(
                'success',
                'Banner PPDB berhasil diperbarui'
            );
    }
}