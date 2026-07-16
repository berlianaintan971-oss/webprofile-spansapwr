@extends('frontend.layout')

@section('title', 'Struktur Organisasi')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">Struktur Organisasi</h1>
        <p class="text-muted fs-5">
            Bagan susunan kepengurusan dan manajemen internal SMP Negeri 1 Purworejo
        </p>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        @if($struktur && $struktur->foto)

            <div class="p-4 bg-light">

                @if(\Illuminate\Support\Str::endsWith($struktur->foto, ['.pdf', '.doc', '.docx']))

                    <div class="alert alert-warning text-center mb-0">

                        <h5 class="fw-bold mb-3">
                            Dokumen Struktur Organisasi
                        </h5>

                        <p>
                            Struktur organisasi tersedia dalam bentuk dokumen.
                        </p>

                        <a href="{{ asset('storage/'.$struktur->foto) }}"
                           class="btn btn-warning"
                           download>

                            <i class="bi bi-download"></i>
                            Unduh Dokumen

                        </a>

                    </div>

                @else

                    <img
                        src="{{ asset('storage/'.$struktur->foto) }}"
                        alt="Struktur Organisasi"
                        class="img-fluid rounded-4 shadow-sm w-100"
                        style="max-height:700px; object-fit:contain;">

                @endif

                <div class="text-center mt-3 text-muted fst-italic">
                    Bagan Resmi Struktur Organisasi SMP Negeri 1 Purworejo
                </div>

            </div>

        @endif

        <div class="card-body p-4 p-lg-5">

            @if($struktur && $struktur->konten)

                <div style="text-align:justify; line-height:2; font-size:17px;">

                    {!! nl2br(e($struktur->konten)) !!}

                </div>

            @else

                <div class="alert alert-secondary text-center">
                    Informasi struktur organisasi belum tersedia.
                </div>

            @endif

        </div>

        <div class="card-footer bg-white border-0 text-center pb-4">



        </div>

    </div>

</div>

@endsection