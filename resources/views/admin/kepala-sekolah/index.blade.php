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

    .foto-preview{
        width: 200px;
        height: 250px;
        object-fit: cover;
        border-radius: 15px;
        border: 3px solid #e2e8f0;
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
            Data Kepala Sekolah
        </h2>

        <p class="text-muted mb-0">
            Kelola informasi kepala sekolah dan sambutan.
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

        <form action="{{ route('kepala-sekolah.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Foto Kepala Sekolah
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control mb-3">

                    @if(!empty($kepalaSekolah->foto))

                        <img
                            src="{{ asset('foto_kepsek/'.$kepalaSekolah->foto) }}"
                            class="foto-preview">

                    @else

                        <div class="text-muted">
                            Belum ada foto
                        </div>

                    @endif

                </div>

                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nama Kepala Sekolah
                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama', $kepalaSekolah->nama ?? '') }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Sambutan Kepala Sekolah
                        </label>

                        <textarea
                            name="sambutan"
                            rows="10"
                            class="form-control">{{ old('sambutan', $kepalaSekolah->sambutan ?? '') }}</textarea>

                    </div>

                </div>

            </div>


            <button type="submit"
                    class="btn btn-primary btn-custom">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

</x-app-layout>