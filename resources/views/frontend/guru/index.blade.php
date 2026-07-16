@extends('frontend.layout')

@section('content')

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark fs-3">Struktur Organisasi Sekolah</h1>
            <p class="text-muted small">Profil Kepala Sekolah, Tenaga Kependidikan, dan Pendidik SMP Negeri 1 Purworejo</p>
        </div>

        <div class="space-y-5">
            
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4 border-bottom pb-2">
                    <h4 class="fw-bold text-amber-600 mb-0 fs-5">
                        <i class="bi bi-person-badge-fill me-2"></i>Pimpinan Sekolah (Kepala Sekolah)
                    </h4>
                </div>
                
                <div class="row justify-content-center">
                    @forelse($kepalaSekolah as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 card-hover border-top border-3 border-amber-500">
                                <div class="position-relative overflow-hidden bg-slate-100 style-img-container">
                                    @if($item->foto)
                                        <img src="{{ asset('foto_guru/'.$item->foto) }}" class="guru-photo" alt="{{ $item->nama }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted py-5" style="aspect-ratio: 3/4;">
                                            <i class="bi bi-person-square display-5"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-dark mb-1 fs-6">{{ $item->nama }}</h6>
                                    <p class="text-amber-700 font-medium mb-0" style="font-size: 0.75rem; text-transform: uppercase; tracking-wider;">{{ $item->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-2 text-muted">
                            <p class="small italic">Data Kepala Sekolah belum tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mb-5">
                <div class="d-flex align-items-center mb-4 border-bottom pb-2">
                    <h4 class="fw-bold text-secondary mb-0 fs-5">
                        <i class="bi bi-people me-2"></i>Tenaga Kependidikan (Staf Sekolah)
                    </h4>
                    <span class="badge bg-secondary ms-2 rounded-pill small" style="font-size: 0.7rem;">
                        {{ $staf->count() }} Personel
                    </span>
                </div>
                
                <div class="row">
                    @forelse($staf as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 card-hover">
                                <div class="position-relative overflow-hidden bg-slate-100 style-img-container">
                                    @if($item->foto)
                                        <img src="{{ asset('foto_guru/'.$item->foto) }}" class="guru-photo" alt="{{ $item->nama }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted py-5" style="aspect-ratio: 3/4;">
                                            <i class="bi bi-person-square display-5"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-dark mb-1 fs-6">{{ $item->nama }}</h6>
                                    <p class="text-secondary small mb-0">{{ $item->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-2 text-muted">
                            <p class="small italic">Data staf sekolah belum tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mb-5">
                <div class="d-flex align-items-center mb-4 border-bottom pb-2">
                    <h4 class="fw-bold text-primary mb-0 fs-5">
                        <i class="bi bi-person-workspace me-2"></i>Tenaga Pendidik (Guru)
                    </h4>
                    <span class="badge bg-primary ms-2 rounded-pill small" style="font-size: 0.7rem;">
                        {{ $guru->count() }} Personel
                    </span>
                </div>
                
                <div class="row">
                    @forelse($guru as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card border-0 shadow-sm h-100 card-hover">
                                <div class="position-relative overflow-hidden bg-slate-100 style-img-container">
                                    @if($item->foto)
                                        <img src="{{ asset('foto_guru/'.$item->foto) }}" class="guru-photo" alt="{{ $item->nama }}">
                                    @else
                                        <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted py-5" style="aspect-ratio: 3/4;">
                                            <i class="bi bi-person-square display-5"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body text-center p-3">
                                    <h6 class="fw-bold text-dark mb-1 fs-6">{{ $item->nama }}</h6>
                                    <p class="text-primary small mb-0">{{ $item->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-2 text-muted">
                            <p class="small italic">Data tenaga pendidik belum tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.guru-photo {
    width: 100%;
    aspect-ratio: 3/4;
    object-fit: cover;
    background: #f8fafc;
    transition: transform 0.3s ease;
}
.card-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    border-radius: 12px;
    overflow: hidden;
}
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
}
.card-hover:hover .guru-photo {
    transform: scale(1.03);
}
.style-img-container {
    border-bottom: 2px solid #f1f5f9;
}
</style>

@endsection