@extends('frontend.layout')

@section('content')

<section class="py-5 bg-light">
    <div class="container">
        <!-- HEADER HALAMAN -->
        <div class="d-flex align-items-center mb-4 border-bottom pb-2">
            <h4 class="fw-bold text-primary mb-0 fs-5">
                <i class="bi bi-person-workspace me-2"></i>Tenaga Pendidik (Guru)
            </h4>
            <span class="badge bg-primary ms-2 rounded-pill small" style="font-size: 0.7rem;">
                {{ method_exists($guru, 'total') ? $guru->total() : $guru->count() }} Personel
            </span>
        </div>
        
        <!-- GRID DAFTAR GURU -->
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
                <div class="col-12 text-center py-5 text-muted">
                    <i class="bi bi-people display-4 d-block mb-3 text-slate-300"></i>
                    <p class="small italic">Data tenaga pendidik belum tersedia.</p>
                </div>
            @endforelse
        </div>

        <!-- TOMBOL NAVIGASI PAGINATION -->
        @if(method_exists($guru, 'links'))
            <div class="d-flex justify-content-center mt-4 custom-pagination">
                {{ $guru->links('pagination::bootstrap-5') }}
            </div>
        @endif
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
.custom-pagination .page-link {
    padding: 8px 16px;
    margin: 0 4px;
    border-radius: 6px !important;
}
</style>

@endsection