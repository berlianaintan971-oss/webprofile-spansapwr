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

    .banner-preview{
        width: 100%;
        max-height: 450px;
        object-fit: contain;
        border-radius: 15px;
        border: 2px solid #e2e8f0;
        padding: 10px;
        background: #fff;
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
            Banner PPDB
        </h2>

        <p class="text-muted mb-0">
            Kelola banner atau poster Penerimaan Peserta Didik Baru.
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

        <form action="{{ route('ppdb.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Upload Banner PPDB
                </label>

                <input type="file"
                       name="banner"
                       class="form-control">

                <small class="text-muted">
                    Format yang didukung: JPG, JPEG, PNG.
                </small>

            </div>

            @if(!empty($ppdb->banner))

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Banner Saat Ini
                    </label>

                    <div class="mt-2">

                        <img
                            src="{{ asset('banner_ppdb/'.$ppdb->banner) }}"
                            class="banner-preview">

                    </div>

                </div>

            @endif

            <button type="submit"
                    class="btn btn-warning btn-custom">

                Simpan Banner

            </button>

        </form>

    </div>

</div>

</x-app-layout>