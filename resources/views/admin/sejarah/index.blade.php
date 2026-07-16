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
        object-fit:cover;
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
            Sejarah Sekolah
        </h2>

        <p class="text-muted mb-0">
            Kelola informasi sejarah SMP Negeri 1 Purworejo.
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

        <form action="{{ route('sejarah.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <!-- Foto -->
                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Foto Sejarah
                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="form-control mb-3">

                    @error('foto')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                    @if(!empty($sejarah->foto))

                        <img
                            src="{{ asset('storage/'.$sejarah->foto) }}"
                            class="foto-preview">

                    @else

                        <div class="border rounded-3 p-5 text-center text-muted">

                            Belum ada foto

                        </div>

                    @endif

                </div>

                <!-- Isi -->
                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Isi Sejarah
                        </label>

                        <textarea
                            name="konten"
                            rows="15"
                            class="form-control @error('konten') is-invalid @enderror"
                            placeholder="Masukkan sejarah sekolah...">{{ old('konten', $sejarah->konten ?? '') }}</textarea>

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

                {{ empty($sejarah->id) ? 'Simpan Data' : 'Simpan Perubahan' }}

            </button>

        </form>

    </div>

</div>

</x-app-layout>