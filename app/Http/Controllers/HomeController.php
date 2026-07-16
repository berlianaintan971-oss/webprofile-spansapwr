<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Akreditasi;
use App\Models\Ppdb;

class HomeController extends Controller
{
    public function dashboard()
    {
        $jumlahBerita = Berita::count();
        $jumlahGuru = Guru::count();

        $akreditasi = Akreditasi::first();
        $ppdb = Ppdb::first();

        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('dashboard', compact(
            'jumlahBerita',
            'jumlahGuru',
            'akreditasi',
            'ppdb',
            'beritaTerbaru'
        ));
    }
}