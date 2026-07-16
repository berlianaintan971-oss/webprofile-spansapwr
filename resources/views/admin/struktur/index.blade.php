<x-app-layout>

<style>

    .page-title{
        font-size:30px;
        font-weight:bold;
        color:#0f172a;
    }

    .custom-card{
        background:white;
        border-radius:22px;
        padding:25px;
        box-shadow:0 5px 20px rgba(0,0,0,.05);
        border:none;
    }

    .foto-preview{
        width:100%;
        max-width:350px;
        border-radius:15px;
        border:3px solid #e2e8f0;
        object-fit:contain;
        background:#fff;
    }

    .btn-custom{
        border-radius:10px;
        padding:10px 18px;
        font-weight:500;
    }

</style>

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4">

        <h2 class="page-title">
            Struktur Organisasi
        </h2>

        <p class="text-muted mb-0">
            Kelola bagan dan keterangan struktur organisasi SMP Negeri 1 Purworejo.
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

        <form action="{{ route('struktur-organisasi.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <!-- Upload Gambar -->
                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Bagan Struktur Organisasi
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control mb-3"
                        accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">

                    <small class="text-muted">
                        Format: JPG, PNG, PDF, DOC, DOCX
                    </small>

                    @error('foto')
                        <div class="text-danger small mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mt-3">

                        @if(!empty($struktur->foto))

                            @if(\Illuminate\Support\Str::endsWith($struktur->foto, ['.pdf','.doc','.docx']))

                                <div class="alert alert-warning text-center">

                                    <i class="bi bi-file-earmark-text fs-1"></i>

                                    <p class="mb-2 mt-2">
                                        Dokumen telah diunggah.
                                    </p>

                                    <a href="{{ asset('storage/'.$struktur->foto) }}"
                                       target="_blank"
                                       class="btn btn-warning btn-sm">

                                        Lihat Dokumen

                                    </a>

                                </div>

                            @else

                                <img
                                    src="{{ asset('storage/'.$struktur->foto) }}"
                                    class="foto-preview">

                            @endif

                        @else

                            <div class="border rounded-3 p-5 text-center text-muted">

                                Belum ada bagan

                            </div>

                        @endif

                    </div>

                </div>

                <!-- Keterangan -->
                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Keterangan / Deskripsi
                        </label>

                        <textarea
                            name="konten"
                            rows="15"
                            class="form-control @error('konten') is-invalid @enderror"
                            placeholder="Masukkan penjelasan struktur organisasi...">{{ old('konten', $struktur->konten ?? '') }}</textarea>

                        @error('konten')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary btn-custom">

                <i class="bi bi-floppy-fill me-1"></i>

                {{ empty($struktur->id) ? 'Simpan Data' : 'Simpan Perubahan' }}

            </button>

        </form>

    </div>

</div>

</x-app-layout>