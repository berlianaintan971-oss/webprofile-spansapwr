@extends('frontend.layout')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">
            Sistem Penerimaan Murid Baru
        </h1>
        <p class="text-muted">
            Informasi Sistem Penerimaan Murid Baru SMP Negeri 1 Purworejo.
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow rounded-4 overflow-hidden">

                @if(isset($ppdb) && $ppdb->banner)
                    <img src="{{ asset('banner_ppdb/' . $ppdb->banner) }}" class="img-fluid w-100" alt="Banner PPDB">
                @else
                    <div class="text-center p-5 bg-light rounded-4">
                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted m-0 mt-2">Banner informasi PPDB belum diunggah oleh admin.</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

</div>
@endsection