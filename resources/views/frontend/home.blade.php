@extends('frontend.layout')

@section('content')

<section class="hero-section d-flex align-items-center position-relative overflow-hidden">
    <div class="hero-overlay"></div>
    <div class="container position-relative z-1">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-8 col-xl-7 text-center text-lg-start">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold mb-3 animate__animated animate__fadeInDown">
                    Official Website
                </span>
                <h1 class="display-3 fw-extrabold text-white mb-3 text-uppercase tracking-wide">
                    SMP Negeri 1 <br><span class="text-warning">Purworejo</span>
                </h1>
                <p class="lead text-white-50 fs-4 mb-4 fw-light lh-base">
                    Mewujudkan peserta didik yang berprestasi, berkarakter, berbudaya, dan berwawasan global.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3">
                    <a href="#profil" class="btn btn-warning btn-lg px-4 py-3 fw-bold shadow-sm custom-btn">
                        <i class="bi bi-info-circle me-2"></i> Profil Sekolah
                    </a>
                    <a href="#berita" class="btn btn-outline-light btn-lg px-4 py-3 fw-medium custom-btn">
                        <i class="bi bi-newspaper me-2"></i> Berita Terbaru
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-6 bg-white position-relative" id="profil">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center position-relative">
                <div class="image-decorator d-none d-lg-block"></div>
                @if($kepalaSekolah && $kepalaSekolah->foto)
                    <img src="{{ asset('foto_kepsek/' . $kepalaSekolah->foto) }}"
                         class="img-fluid kepsek-photo position-relative z-1"
                         alt="{{ $kepalaSekolah->nama }}">
                @else
                    <div class="kepsek-placeholder d-flex align-items-center justify-content-center bg-light rounded-4 shadow-sm mx-auto" style="width: 300px; height: 400px;">
                        <i class="bi bi-person-square display-1 text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-lg-7 text-center text-lg-start">
                <div class="mb-4">
                    <span class="text-primary fw-bold text-uppercase tracking-wider fs-6">Welcome Message</span>
                    <h2 class="fw-extrabold display-5 mt-1 text-dark">
                        Sambutan Kepala Sekolah
                    </h2>
                    <div class="divider mx-auto mx-lg-0 mt-3"></div>
                </div>

                @if($kepalaSekolah)
                    <h4 class="fw-bold text-secondary mb-3">
                        {{ $kepalaSekolah->nama }}
                    </h4>
                    <!-- KUNCI PERUBAHAN: Menghapus Str::limit agar teks tampil penuh & membungkus dengan nl2br agar enter paragraf berfungsi -->
                    <div class="text-muted fs-5 lh-lg mb-0 text-justify">
                        {!! nl2br(e($kepalaSekolah->sambutan)) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@if($visiMisi)
<section class="py-6 visi-section text-white position-relative" id="visi-misi">
    <div class="container position-relative z-1">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-bold mb-2">FOUNDATION</span>
            <h2 class="fw-extrabold display-5 text-white">Visi & Misi Sekolah</h2>
            <p class="text-white-50 fs-5 mt-2">
                Landasan dan arah pengembangan jangka panjang SMP Negeri 1 Purworejo
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-5">
                <div class="card h-100 border-0 shadow-lg blur-card bg-white text-dark">
                    <div class="card-body p-5 d-flex flex-column justify-content-between">
                        <div>
                            <div class="icon-box bg-primary-soft text-primary mb-4">
                                <i class="bi bi-eye-fill fs-3"></i>
                            </div>
                            <h3 class="fw-extrabold text-primary mb-3">Visi</h3>
                            <p class="fs-5 lh-base text-secondary mb-0">
                                "{{ $visiMisi->visi }}"
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card h-100 border-0 shadow-lg bg-white text-dark">
                    <div class="card-body p-5">
                        <div class="icon-box bg-success-soft text-success mb-4">
                            <i class="bi bi-bullseye fs-3"></i>
                        </div>
                        <h3 class="fw-extrabold text-success mb-3">Misi</h3>
                        <div class="fs-6 lh-lg text-secondary misi-content">
                            {!! nl2br(e($visiMisi->misi)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($akreditasi)
<section class="py-6 bg-light akreditasi-section" id="akreditasi">
    <div class="container">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-primary fw-bold text-uppercase tracking-wider fs-6">Quality Assurance</span>
            <h2 class="fw-extrabold display-5 mt-1 text-dark">Akreditasi Sekolah</h2>
            <p class="text-muted fs-5">Bukti kualitas tata kelola dan mutu pendidikan kami</p>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center">
                @if($akreditasi->foto_sertifikat)
                    <img src="{{ asset('foto_akreditasi/'.$akreditasi->foto_sertifikat) }}"
                         class="img-fluid rounded-4 shadow-lg akreditasi-img w-100" 
                         alt="Sertifikat Akreditasi">
                @endif
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                    <div class="card-body p-5 bg-white">
                        <div class="d-flex align-items-center gap-4 mb-4">
                            <div class="bg-primary text-white rounded-4 p-4 d-inline-block shadow-sm">
                                <h1 class="display-1 fw-black mb-0 leading-none text-white">{{ $akreditasi->nilai_akreditasi }}</h1>
                            </div>
                            <div>
                                <span class="badge bg-success mb-2 px-3 py-2 fs-6">Terakreditasi Resmi</span>
                                <h5 class="text-secondary mb-0 fw-bold">
                                    Masa Penilaian Tahun {{ $akreditasi->tahun }}
                                </h5>
                            </div>
                        </div>
                        <hr class="text-muted my-4">
                        <p class="text-muted fs-5 lh-lg mb-0">
                            {{ $akreditasi->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- BERITA -->
<section class="py-5 bg-light berita-section" id="berita">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <span class="text-primary fw-bold text-uppercase">
                    Update Terkini
                </span>
                <h2 class="fw-bold mt-2 mb-0">
                    Berita & Informasi
                </h2>
                <p class="text-muted mb-0">
                    Informasi terbaru seputar kegiatan dan prestasi SMP Negeri 1 Purworejo.
                </p>
            </div>

            <a href="{{ route('frontend.berita.index') }}" class="btn btn-primary rounded-pill px-4">
                Lihat Semua Berita
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($berita as $item)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('frontend.berita.detail', $item->id) }}" class="text-decoration-none">
                        <div class="card berita-card border-0 h-100">
                            @if($item->gambar)
                                <img src="{{ asset('gambar_berita/'.$item->gambar) }}" class="berita-image" alt="{{ $item->judul }}">
                            @else
                                <img src="https://via.placeholder.com/600x350?text=Berita+Sekolah" class="berita-image" alt="Berita">
                            @endif

                            <div class="card-body p-4 d-flex flex-column">
                                <div class="mb-3">
                                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $item->created_at->format('d MY') }}
                                    </span>
                                </div>

                                <h5 class="fw-bold text-dark mb-3 berita-title">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted flex-grow-1">
                                    {{ Str::limit(strip_tags($item->isi), 140) }}
                                </p>

                                <div class="mt-3">
                                    <span class="text-primary fw-semibold">
                                        Baca Selengkapnya
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        Belum ada berita yang dipublikasikan.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- GURU & STAF -->
<section class="py-5 guru-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <span class="text-primary fw-bold text-uppercase">
                    Tenaga Pendidik
                </span>
                <h2 class="fw-bold mb-0">
                    Guru & Staf
                </h2>
                <p class="text-muted mb-0">
                    Dibimbing oleh tenaga pendidik profesional dan berkompeten
                </p>
            </div>

            <a href="{{ route('frontend.guru.index') }}" class="btn btn-outline-primary rounded-pill">
                Lihat Semua
                <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row">
            @foreach($guru as $item)
                <div class="col-md-3 mb-4">
                    <div class="card guru-card border-0 shadow-sm h-100">
                        @if($item->foto)
                            <img src="{{ asset('foto_guru/'.$item->foto) }}" class="guru-photo" alt="{{ $item->nama }}">
                        @else
                            <img src="https://via.placeholder.com/600x800" class="guru-photo">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="fw-bold mb-2">
                                {{ $item->nama }}
                            </h5>
                            <span class="badge bg-primary">
                                {{ $item->jabatan }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@if($ppdb && $ppdb->banner)
<section id="ppdb" class="py-5 bg-primary text-center text-white">
    <div class="container position-relative z-1">
        <div class="max-w-2xl mx-auto mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3">Penerimaan Siswa Baru</span>
            <h2 class="fw-extrabold display-5 text-white mb-2">PPDB SMP Negeri 1 Purworejo</h2>
            <p class="text-white-50 fs-5">Mari bergabung bersama keluarga besar sekolah pilihan terbaik</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <img src="{{ asset('banner_ppdb/' . $ppdb->banner) }}" class="img-fluid ppdb-banner rounded-4 shadow-2xl" alt="Banner PPDB">
            </div>
        </div>
    </div>
</section>
@endif

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
@import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css');

html {
    scroll-behavior: smooth;
}

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* Utilities Global */
.py-6 { padding-top: 5rem; padding-bottom: 5rem; }
.fw-extrabold { font-weight: 800; }
.fw-black { font-weight: 900; }
.fs-7 { font-size: 0.85rem; }
.max-w-2xl { max-width: 42rem; }
.leading-none { line-height: 1; }
.z-1 { z-index: 1; }

.divider {
    height: 3px;
    width: 60px;
    background: #2563eb;
    border-radius: 2px;
}

/* Menambahkan kelas perataan teks rata kanan-kiri (Justify) agar terlihat rapi */
.text-justify {
    text-align: justify;
}

/* Background Soft Color */
.bg-primary-soft { background-color: rgba(37, 99, 235, 0.1); }
.bg-success-soft { background-color: rgba(22, 163, 74, 0.1); }
.bg-secondary-soft { background-color: rgba(100, 116, 139, 0.1); }
.text-primary-soft { color: #2563eb; }

/* Hero Modernization */
.hero-section {
    background: url("{{ asset('foto_smpn1.jpg') }}") no-repeat center center;
    background-size: cover;
}
.hero-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.5) 30%, rgba(37, 99, 235, 0.2) 100%);
}
.custom-btn {
    border-radius: 12px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.custom-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

/* Sambutan */
.kepsek-photo {
    max-width: 100%;
    width: 320px;
    height: 420px;
    object-fit: cover;
    border-radius: 24px;
    box-shadow: 0 20px 40px rgba(15, 23, 42, 0.15);
}
.image-decorator {
    position: absolute;
    width: 320px;
    height: 420px;
    border: 4px solid #2563eb;
    border-radius: 24px;
    top: 20px;
    left: calc(50% - 140px);
    z-index: 0;
}

/* Visi Misi Section */
.visi-section {
    background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
}
.icon-box {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.misi-content {
    color: #475569;
}

/* Cards Hover Animation & Design */
.card {
    border-radius: 20px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.hover-up:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 30px rgba(15, 23, 42, 0.08) !important;
}
.hover-up:hover .transition-icon {
    transform: translateX(5px);
}
.transition-icon {
    transition: transform 0.3s ease;
}

.berita-card{
    border-radius:20px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.berita-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.berita-image{
    width:100%;
    height:240px;
    object-fit:cover;
}

.berita-title{
    min-height:60px;
    line-height:1.5;
}

/* Guru Photo Design */
.guru-card{
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
}

.guru-card:hover{
    transform:translateY(-8px);
}

.guru-photo{
    width:100%;
    aspect-ratio:3/4;
    object-fit:cover;
}

/* PPDB Section */
.ppdb-section {
    background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
}
.ppdb-banner {
    border-radius: 24px;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    transition: transform 0.4s ease;
}
.ppdb-banner:hover {
    transform: scale(1.01);
}

/* Responsive Overrides */
@media(max-width: 768px) {
    .py-6 { padding-top: 3.5rem; padding-bottom: 3.5rem; }
    .display-3 { font-size: 2.5rem; }
    .display-5 { font-size: 2rem; }
}
</style>
@endsection