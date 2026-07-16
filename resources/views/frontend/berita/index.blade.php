@extends('frontend.layout')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <!-- Header -->
        <div class="text-center mb-5">

            <span class="text-primary fw-bold text-uppercase">
                Informasi Sekolah
            </span>

            <h1 class="fw-bold mt-2">
                Berita & Kegiatan Sekolah
            </h1>

            <p class="text-muted">
                Informasi terbaru, kegiatan, prestasi, dan pengumuman
                SMP Negeri 1 Purworejo.
            </p>

        </div>

        <!-- List Berita -->
        <div class="row g-4">

            @forelse($berita as $item)

                <div class="col-lg-4 col-md-6">

                    <div class="card berita-card border-0 shadow-sm h-100 overflow-hidden">

                        <!-- FOTO BERITA -->
                        @if($item->gambar)

                            <img src="{{ asset('gambar_berita/'.$item->gambar) }}"
                                 class="berita-image"
                                 alt="{{ $item->judul }}">

                        @else

                            <img src="https://via.placeholder.com/600x350?text=Berita+Sekolah"
                                 class="berita-image"
                                 alt="Berita">

                        @endif

                        <div class="card-body d-flex flex-column">

                            <div class="mb-3">

                                <span class="badge bg-primary-subtle text-primary px-3 py-2">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $item->created_at->format('d M Y') }}

                                </span>

                            </div>

                            <h5 class="fw-bold berita-title">

                                {{ $item->judul }}

                            </h5>

                            <p class="text-muted flex-grow-1">

                                {{ Str::limit(strip_tags($item->isi), 150) }}

                            </p>

                            <a href="{{ route('frontend.berita.detail', $item->id) }}"
                               class="btn btn-primary rounded-pill mt-3">

                                Baca Selengkapnya

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Belum ada berita yang dipublikasikan.

                    </div>

                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">

            {{ $berita->links() }}

        </div>

    </div>

</section>

<style>

.berita-card{
    border-radius:20px;
    transition:.3s;
}

.berita-card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 35px rgba(0,0,0,.08)!important;
}

.berita-image{
    width:100%;
    height:240px;
    object-fit:cover;
}

.berita-title{
    min-height:60px;
    color:#1e293b;
}

</style>

@endsection