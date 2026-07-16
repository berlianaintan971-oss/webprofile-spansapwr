@extends('frontend.layout') @section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm p-4 p-md-5 mx-auto" style="border-radius: 24px; max-width: 900px; background: #ffffff;">
        
        <h1 class="text-center fw-extrabold text-dark mb-1 tracking-tight" style="font-size: 2rem; font-weight: 800;">
            Visi & Misi Sekolah
        </h1>
        <p class="text-center text-muted small text-uppercase tracking-wider mb-5" style="font-size: 11px;">
            SMP Negeri 1 Purworejo
        </p>
        
        @if($visiMisi)
            <div class="mb-5">
                <h4 class="fw-bold text-primary border-start border-4 border-primary ps-3 mb-3" style="color: #0d47a1 !important;">
                    Visi Sekolah
                </h4>
                <div class="p-4 rounded-4 text-justify shadow-sm border border-light" style="background: #f8fafc; white-space: pre-line; color: #334155; line-height: 1.7;">
                    {{ $visiMisi->visi }}
                </div>
            </div>

            <div class="mb-4">
                <h4 class="fw-bold text-primary border-start border-4 border-primary ps-3 mb-3" style="color: #0d47a1 !important;">
                    Misi Sekolah
                </h4>
                <div class="p-4 rounded-4 text-justify shadow-sm border border-light" style="background: #f8fafc; white-space: pre-line; color: #334155; line-height: 1.7;">
                    {{ $visiMisi->misi }}
                </div>
            </div>
        @else
            <div class="text-center py-5 text-muted fst-italic">
                <i class="bi bi-exclamation-circle d-block fs-2 mb-2 text-secondary"></i>
                Data Visi & Misi belum dikonfigurasi di panel admin.
            </div>
        @endif

    </div>
</div>
@endsection