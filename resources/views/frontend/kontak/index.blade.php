@extends('frontend.layout')

@section('content')

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold">
                Hubungi Kami
            </h1>
            <p class="text-muted">
                Informasi kontak SMP Negeri 1 Purworejo
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">
                            Informasi Sekolah
                        </h4>

                        <div class="mb-4">
                            <h6 class="fw-bold">
                                <i class="bi bi-geo-alt-fill text-primary"></i>
                                Alamat
                            </h6>
                            <p class="text-muted mb-0">
                                Jl. Jenderal Sudirman No.8, Ngupasan, Pangenjurutengah, Kec. Purworejo, Kabupaten Purworejo, Jawa Tengah 54114
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold">
                                <i class="bi bi-telephone-fill text-success"></i>
                                Telepon
                            </h6>
                            <p class="text-muted mb-0">
                                (0275) 321405
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold">
                                <i class="bi bi-envelope-fill text-danger"></i>
                                Email
                            </h6>
                            <p class="text-muted mb-0">
                                smp1pwj@gmail.com
                            </p>
                        </div>

                        <div>
                            <h6 class="fw-bold">
                                Media Sosial
                            </h6>
                            <div class="d-flex gap-2 mt-3">
                                <a href="https://www.instagram.com/spensaofficial/" 
                                   target="_blank" 
                                   class="btn btn-danger" 
                                   rel="noopener noreferrer">
                                    <i class="bi bi-instagram"></i>
                                </a>

                                <a href="#" class="btn btn-dark">
                                    <i class="bi bi-tiktok"></i>
                                </a>

                                <a href="https://youtube.com/channel/UCihVWtbZnwFa6zorwxCnMog" 
                                   target="_blank" 
                                   class="btn btn-danger" 
                                   rel="noopener noreferrer">
                                    <i class="bi bi-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.6631690850695!2d110.00107831177856!3d-7.719242192266627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aebcda1372f75%3A0x25e0674fa1f6f5f8!2sSMP%20Negeri%201%20Purworejo!5e0!3m2!1sid!2sid!4v1781344078833!5m2!1sid!2sid"
                            width="100%"
                            height="500"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection