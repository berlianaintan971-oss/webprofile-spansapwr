@extends('frontend.layout')

@section('content')

<style>
    .hero-image {
        height: 420px;
        object-fit: cover;
        width: 100%;
    }

    .detail-card {
        border: none;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
    }

    .badge-info {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        padding: 18px;
        height: 100%;
    }

    .badge-info i {
        font-size: 28px;
        color: #2563eb;
        margin-bottom: 10px;
    }

    .badge-title {
        font-size: 14px;
        color: #64748b;
        margin-bottom: 4px;
    }

    .badge-value {
        font-weight: 600;
        color: #0f172a;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 20px;
    }

    .description {
        line-height: 1.9;
        color: #475569;
        text-align: justify;
    }

    .btn-back {
        border-radius: 12px;
        padding: 12px 25px;
        font-weight: 500;
    }
</style>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card detail-card">

                @if($ekstrakurikuler->foto)
                    <img
                        src="{{ asset('storage/'.$ekstrakurikuler->foto) }}"
                        class="hero-image"
                        alt="{{ $ekstrakurikuler->nama }}">
                @else
                    <img
                        src="https://via.placeholder.com/1200x450?text=Ekstrakurikuler"
                        class="hero-image"
                        alt="Ekstrakurikuler">
                @endif

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <span class="badge bg-primary px-3 py-2 mb-3">
                            EKSTRAKURIKULER
                        </span>

                        <h1 class="fw-bold text-dark mb-2">
                            {{ $ekstrakurikuler->nama }}
                        </h1>

                        <p class="text-muted mb-0">
                            Kegiatan pengembangan bakat, minat, dan karakter peserta didik.
                        </p>

                    </div>

                    <div class="row g-4 mb-5">

                        <div class="col-md-6">

                            <div class="badge-info text-center">

                                <i class="bi bi-person-badge-fill"></i>

                                <div class="badge-title">
                                    Pembina
                                </div>

                                <div class="badge-value">
                                    {{ $ekstrakurikuler->pembina ?? '-' }}
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="badge-info text-center">

                                <i class="bi bi-calendar-event-fill"></i>

                                <div class="badge-title">
                                    Jadwal Kegiatan
                                </div>

                                <div class="badge-value">
                                    {{ $ekstrakurikuler->jadwal ?? '-' }}
                                </div>

                            </div>

                        </div>

                    </div>

                    <div>

                        <h4 class="section-title">
                            Deskripsi Kegiatan
                        </h4>

                        <div class="description">

                            @if($ekstrakurikuler->deskripsi)
                                {!! nl2br(e($ekstrakurikuler->deskripsi)) !!}
                            @else
                                <p class="text-muted fst-italic">
                                    Deskripsi kegiatan belum tersedia.
                                </p>
                            @endif

                        </div>

                    </div>

                    <div class="text-center mt-5">


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection