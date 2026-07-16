@extends('frontend.layout') {{-- Menyesuaikan dengan nama file layout utama Anda --}}

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-extrabold text-dark mb-2" style="font-size: 2.5rem; font-weight: 800;">
            Akreditasi Sekolah
        </h1>
        <p class="text-muted">
            Peringkat kelayakan dan penjaminan mutu pendidikan resmi SMP Negeri 1 Purworejo
        </p>
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px; background: #ffffff;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0 text-dark">
                        <i class="bi bi-file-earmark-text text-primary me-2"></i>Pratinjau Sertifikat Resmi BAN-PDM
                    </h5>
                    {{-- DIPERBAIKI: Menggunakan foto_sertifikat sesuai database --}}
                    @if(isset($akreditasi) && $akreditasi->foto_sertifikat)
                        <a href="{{ asset('foto_akreditasi/' . $akreditasi->foto_sertifikat) }}" target="_blank" class="text-decoration-none small fw-semibold text-primary">
                            Buka Penuh <i class="bi bi-box-arrow-up-right ms-1"></i>
                        </a>
                    @endif
                </div>
                
                <div class="text-center p-2 rounded-3 border bg-light flex-grow-1 d-flex align-items-center justify-content-center" style="min-height: 350px;">
                    {{-- DIPERBAIKI: Kondisi @if memeriksa foto_sertifikat --}}
                    @if(isset($akreditasi) && $akreditasi->foto_sertifikat)
                        <img src="{{ asset('foto_akreditasi/' . $akreditasi->foto_sertifikat) }}" class="img-fluid rounded shadow-sm" alt="Sertifikat Akreditasi" style="max-height: 450px; object-fit: contain;">
                    @else
                        <div class="text-center p-4">
                            <i class="bi bi-image text-muted mb-2" style="font-size: 3rem;"></i>
                            <p class="text-muted small m-0">Sertifikat akreditasi belum diunggah oleh admin.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 20px; background: #ffffff;">
                
                <h6 class="text-muted fw-bold text-uppercase tracking-wider mb-3" style="font-size: 11px;">Status Resmi</h6>
                <div class="p-4 rounded-4 d-flex align-items-center mb-4 text-white" style="background: linear-gradient(135deg, #2563eb, #1d4ed8);">
                    {{-- DIPERBAIKI: Menggunakan nilai_akreditasi --}}
                    <div class="bg-white text-primary rounded-3 fw-bold text-center d-flex align-items-center justify-content-center me-4 shadow-sm" style="width: 70px; height: 70px; font-size: 2rem;">
                        {{ $akreditasi->nilai_akreditasi ?? 'A' }}
                    </div>
                    <div>
                        <div class="small opacity-75 text-uppercase">Tahun Penilaian</div>
                        <div class="fs-4 fw-bold mb-1">{{ $akreditasi->tahun ?? '2026' }}</div>
                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3 py-1.5 small font-medium">
                            Aktif / Terverifikasi
                        </span>
                    </div>
                </div>

                <h6 class="text-muted fw-bold text-uppercase tracking-wider mb-3" style="font-size: 11px;">Keterangan SK</h6>
                <div class="text-secondary small d-flex flex-column gap-3" style="line-height: 1.6; text-align: justify;">
                    {{-- DIPERBAIKI: Menampilkan isi deskripsi dinamis langsung dari inputan admin --}}
                    @if(isset($akreditasi) && $akreditasi->deskripsi)
                        <p class="m-0 text-dark" style="white-space: pre-line;">
                            {{ $akreditasi->deskripsi }}
                        </p>
                    @else
                        <p class="m-0">
                            Status Akreditasi Sekolah <strong class="text-dark">SMP Negeri 1 Purworejo Terakreditasi "{{ $akreditasi->nilai_akreditasi ?? 'A' }}" (Unggul)</strong> berdasarkan penilaian komprehensif yang dilakukan oleh Badan Akreditasi Nasional Pendidikan Anak Usia Dini, Pendidikan Dasar, dan Pendidikan Menengah (BAN-PDM).
                        </p>
                        <p class="m-0">
                            Pencapaian ini merupakan bukti nyata atas komitmen seluruh civitas akademika sekolah dalam menjaga, mempertahankan, dan meningkatkan mutu pendidikan secara berkelanjutan.
                        </p>
                    @endif
                    
                    <div class="pt-2 border-top">
                        <h6 class="fw-bold text-dark mb-2">Apa Arti Akreditasi "{{ $akreditasi->nilai_akreditasi ?? 'A' }}" Bagi Kami?</h6>
                        <p class="m-0 text-muted">
                            Status Akreditasi {{ $akreditasi->nilai_akreditasi ?? 'A' }} bukan sekadar predikat, melainkan sebuah jaminan standar mutu fasilitas, tenaga pengajar, kurikulum, serta manajemen tata kelola sekolah yang telah memenuhi ekspektasi mutu nasional.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection