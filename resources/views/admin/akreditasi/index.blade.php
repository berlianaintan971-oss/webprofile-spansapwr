<x-app-layout>

<style>

    .page-title{
        font-size: 30px;
        font-weight: bold;
        color: #0f172a;
    }

    .custom-card{
        background: white;
        border-radius: 22px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        border: none;
    }

    .sertifikat-preview{
        width: 100%;
        max-width: 450px;
        border-radius: 15px;
        border: 2px solid #e2e8f0;
        padding: 8px;
        background: white;
    }

    .btn-custom{
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 500;
    }

</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="page-title">
            Data Akreditasi Sekolah
        </h2>

        <p class="text-muted mb-0">
            Kelola informasi akreditasi dan sertifikat sekolah.
        </p>

    </div>

    <!-- Alert -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <!-- Card -->
    <div class="custom-card">

        <form action="{{ route('akreditasi.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nilai Akreditasi
                        </label>

                        <input type="text"
                               name="nilai_akreditasi"
                               class="form-control"
                               value="{{ old('nilai_akreditasi', $akreditasi->nilai_akreditasi ?? '') }}"
                               placeholder="Contoh: A">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Tahun Akreditasi
                        </label>

                        <input type="text"
                               name="tahun"
                               class="form-control"
                               value="{{ old('tahun', $akreditasi->tahun ?? '') }}"
                               placeholder="Contoh: 2025">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="8"
                            class="form-control">{{ old('deskripsi', $akreditasi->deskripsi ?? '') }}</textarea>

                    </div>

                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Foto Sertifikat
                    </label>

                    <input type="file"
                           name="foto_sertifikat"
                           class="form-control mb-3">

                    @if(!empty($akreditasi->foto_sertifikat))

                        <img
                            src="{{ asset('foto_akreditasi/'.$akreditasi->foto_sertifikat) }}"
                            class="sertifikat-preview">

                    @else

                        <div class="text-muted">
                            Belum ada sertifikat diunggah
                        </div>

                    @endif

                </div>

            </div>


            <button type="submit"
                    class="btn btn-success btn-custom">

                Simpan Data

            </button>

        </form>

    </div>

</div>

</x-app-layout>