<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\KepalaSekolah;
use App\Models\Akreditasi;
use App\Models\Ppdb;
use App\Models\VisiMisi;

// Import Model Profil
use App\Models\Sejarah;
use App\Models\StrukturOrganisasi;
use App\Models\Ekstrakurikuler;

class FrontendController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->take(3)->get();

        // Tampilkan beberapa guru di home
        $guru = Guru::latest()->take(4)->get();

        $kepalaSekolah = KepalaSekolah::first();
        $akreditasi = Akreditasi::first();
        $ppdb = Ppdb::first();
        $visiMisi = VisiMisi::first();

        return view('frontend.home', compact(
            'berita',
            'guru',
            'kepalaSekolah',
            'akreditasi',
            'ppdb',
            'visiMisi'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Semua Berita
    |--------------------------------------------------------------------------
    */

    public function beritaIndex()
    {
        $berita = Berita::latest()->paginate(9);

        return view('frontend.berita.index', compact('berita'));
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Berita
    |--------------------------------------------------------------------------
    */

    public function beritaDetail($id)
    {
        $berita = Berita::findOrFail($id);

        $beritaLain = Berita::where('id', '!=', $id)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'frontend.berita.detail',
            compact('berita', 'beritaLain')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Semua Guru & Staf
    |--------------------------------------------------------------------------
    */

    public function guruIndex()
    {
        $kepalaSekolah = Guru::where('kategori', 'Kepala Sekolah')
            ->orderBy('nama')
            ->get();

        $staf = Guru::where('kategori', 'Staf Sekolah')
            ->orderBy('nama')
            ->get();

        $guru = Guru::where('kategori', 'Guru')
            ->orderBy('nama')
            ->get();

        return view(
            'frontend.guru.index',
            compact('kepalaSekolah', 'staf', 'guru')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Kontak
    |--------------------------------------------------------------------------
    */

    public function kontak()
    {
        return view('frontend.kontak.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Profil Sekolah
    |--------------------------------------------------------------------------
    */

    public function sejarah()
    {
        $sejarah = Sejarah::first();

        return view('frontend.sejarah', compact('sejarah'));
    }

    public function struktur()
    {
        $struktur = StrukturOrganisasi::first();

        return view('frontend.struktur', compact('struktur'));
    }


    /*
    |--------------------------------------------------------------------------
    | Ekstrakurikuler
    |--------------------------------------------------------------------------
    */

    public function ekstrakurikuler()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->get();

        return view(
            'frontend.ekstrakurikuler.index',
            compact('ekstrakurikulers')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Ekstrakurikuler
    |--------------------------------------------------------------------------
    */

    public function detailEkstrakurikuler($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikulerLain = Ekstrakurikuler::where(
            'id',
            '!=',
            $id
        )
        ->latest()
        ->take(3)
        ->get();

        return view(
            'frontend.ekstrakurikuler.detail',
            compact(
                'ekstrakurikuler',
                'ekstrakurikulerLain'
            )
        );
    }

        public function ppdb()
    {
        $ppdb = Ppdb::first();

        return view('frontend.ppdb', compact('ppdb'));
    }
}