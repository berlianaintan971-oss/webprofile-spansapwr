@extends('frontend.layout')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4">

            <!-- Detail Berita -->
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm overflow-hidden">

                    @if($berita->gambar)

                        <img src="{{ asset('gambar_berita/'.$berita->gambar) }}"
                             class="detail-image"
                             alt="{{ $berita->judul }}">

                    @endif

                    <div class="card-body p-4 p-lg-5">

                        <div class="mb-3">

                            <span class="badge bg-primary-subtle text-primary px-3 py-2">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ $berita->created_at->format('d F Y') }}

                            </span>

                        </div>

                        <h1 class="fw-bold mb-4">

                            {{ $berita->judul }}

                        </h1>

                        <div class="artikel-content">

                            {!! nl2br(e($berita->isi)) !!}

                        </div>

                        <div class="mt-5">

                            <a href="{{ route('frontend.berita.index') }}"
                               class="btn btn-outline-primary rounded-pill">

                                <i class="bi bi-arrow-left me-2"></i>

                                Kembali ke Daftar Berita

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm sticky-top"
                     style="top:100px;">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Berita Lainnya

                        </h4>

                        @forelse($beritaLain as $item)

                            <div class="berita-sidebar-item">

                                @if($item->gambar)

                                    <img src="{{ asset('gambar_berita/'.$item->gambar) }}"
                                         class="sidebar-image"
                                         alt="{{ $item->judul }}">

                                @endif

                                <div>

                                    <a href="{{ route('frontend.berita.detail', $item->id) }}"
                                       class="text-decoration-none text-dark">

                                        <h6 class="fw-bold mb-1">

                                            {{ Str::limit($item->judul, 60) }}

                                        </h6>

                                    </a>

                                    <small class="text-muted">

                                        {{ $item->created_at->format('d M Y') }}

                                    </small>

                                </div>

                            </div>

                        @empty

                            <p class="text-muted">
                                Tidak ada berita lainnya.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<style>

.detail-image{
    width:100%;
    max-height:500px;
    object-fit:cover;
}

.artikel-content{
    line-height:2;
    font-size:17px;
    color:#334155;
    text-align:justify;
}

.berita-sidebar-item{
    display:flex;
    gap:15px;
    margin-bottom:20px;
    padding-bottom:20px;
    border-bottom:1px solid #e5e7eb;
}

.berita-sidebar-item:last-child{
    border-bottom:none;
    margin-bottom:0;
    padding-bottom:0;
}

.sidebar-image{
    width:100px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
    flex-shrink:0;
}

</style>

@endsection