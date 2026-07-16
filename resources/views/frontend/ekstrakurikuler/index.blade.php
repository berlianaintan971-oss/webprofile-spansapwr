@extends('frontend.layout')

@section('content')

<style>
    .hero-ekskul {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border-radius: 30px;
        padding: 70px 30px;
        color: white;
        margin-bottom: 60px;
    }

    .hero-ekskul h1 {
        font-size: 42px;
        font-weight: 700;
    }

    .hero-ekskul p {
        font-size: 18px;
        opacity: 0.9;
        max-width: 700px;
        margin: auto;
    }

    .ekskul-card {
        border: none;
        border-radius: 25px;
        overflow: hidden;
        background: white;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        height: 100%;
    }

    .ekskul-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 45px rgba(0,0,0,0.12);
    }

    .ekskul-image {
        height: 240px;
        object-fit: cover;
        width: 100%;
    }

    .ekskul-title {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 20px;
    }

    .info-badge {
        background: #f8fafc;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 12px;
        font-size: 14px;
    }

    .info-badge i {
        color: #2563eb;
        margin-right: 8px;
    }

    .btn-detail {
        border-radius: 50px;
        padding: 10px 22px;
        font-weight: 600;
    }

    .empty-box {
        background: white;
        border-radius: 20px;
        padding: 60px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    }
</style>

<div class="container py-5">

    <!-- Hero -->
    <div class="hero-ekskul text-center">
        <h1>Ekstrakurikuler Sekolah</h1>

        <p class="mt-3">
            SMP Negeri 1 Purworejo menyediakan berbagai kegiatan ekstrakurikuler
            sebagai sarana pengembangan bakat, minat, kreativitas, dan karakter
            peserta didik di bidang akademik maupun non-akademik.
        </p>
    </div>

    <!-- List Ekstrakurikuler -->
    <div class="row">

        @forelse($ekstrakurikulers as $item)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="ekskul-card">

                    @if($item->foto)

                        <img
                            src="{{ asset('storage/'.$item->foto) }}"
                            class="ekskul-image"
                            alt="{{ $item->nama }}">

                    @else

                        <img
                            src="https://via.placeholder.com/600x400?text=Ekstrakurikuler"
                            class="ekskul-image"
                            alt="Ekstrakurikuler">

                    @endif

                    <div class="p-4">

                        <h5 class="ekskul-title">
                            {{ $item->nama }}
                        </h5>

                        <div class="info-badge">
                            <i class="bi bi-person-fill"></i>
                            <strong>Pembina :</strong>
                            {{ $item->pembina ?? '-' }}
                        </div>

                        <div class="info-badge">
                            <i class="bi bi-calendar-event-fill"></i>
                            <strong>Jadwal :</strong>
                            {{ $item->jadwal ?? '-' }}
                        </div>

                        <div class="mt-4">
                            <a
                                href="{{ route('frontend.ekstrakurikuler.detail', $item->id) }}"
                                class="btn btn-primary btn-detail">

                                Selengkapnya
                                <i class="bi bi-arrow-right ms-2"></i>

                            </a>
                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="empty-box text-center">

                    <i class="bi bi-emoji-frown fs-1 text-secondary"></i>

                    <h4 class="mt-3 fw-bold">
                        Belum Ada Data Ekstrakurikuler
                    </h4>

                    <p class="text-muted mb-0">
                        Data kegiatan ekstrakurikuler akan ditampilkan setelah
                        diinput oleh administrator.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection