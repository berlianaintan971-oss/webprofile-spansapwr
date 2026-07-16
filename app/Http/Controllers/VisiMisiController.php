<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first();

        return view(
            'admin.visi_misi.index',
            compact('visiMisi')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $visiMisi = VisiMisi::first();

        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        $visiMisi->visi = $request->visi;
        $visiMisi->misi = $request->misi;

        $visiMisi->save();

        return redirect()
            ->route('visi-misi.index')
            ->with('success', 'Visi Misi berhasil diperbarui');
    }

    /**
     * TAMPILAN DEPAN UNTUK PENGUNJUNG / GUEST (Mencegah Error 404)
     */
    public function showGuest()
    {
        // Mengambil data visi misi pertama dari database
        $visiMisi = VisiMisi::first();

        // Diarahkan ke folder resources/views/frontend/visi_misi_front.blade.php
        return view('frontend.visi_misi_front', compact('visiMisi'));
    }
}