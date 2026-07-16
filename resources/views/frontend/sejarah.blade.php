@extends('frontend.layout')

@section('title', 'Sejarah Sekolah')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">Sejarah Sekolah</h1>
        <p class="text-muted fs-5">
            Rekam jejak perjalanan dan berdirinya SMP Negeri 1 Purworejo
        </p>
    </div>

    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

        @if($sejarah && $sejarah->foto)
            <div class="p-4 bg-light">

                <img
                    src="{{ asset('storage/'.$sejarah->foto) }}"
                    alt="Foto Sejarah"
                    class="img-fluid rounded-4 shadow-sm w-100"
                    style="max-height:550px; object-fit:cover;">

                <div class="text-center mt-3 text-muted fst-italic">
                    Gedung / Dokumentasi Bersejarah SMP Negeri 1 Purworejo
                </div>

            </div>
        @endif

        <div class="card-body p-4 p-lg-5">

            @if($sejarah && $sejarah->konten)

                <div style="text-align:justify; line-height:2; font-size:17px;">

                    {!! nl2br(e($sejarah->konten)) !!}

                </div>

            @else

                <div class="alert alert-secondary text-center">
                    Data sejarah sekolah belum tersedia.
                </div>

            @endif

        </div>

    </div>

</div>

@endsection