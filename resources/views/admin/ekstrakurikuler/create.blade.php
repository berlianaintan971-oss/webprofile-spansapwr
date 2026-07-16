<x-app-layout>

<style>

.page-title{
    font-size:30px;
    font-weight:bold;
    color:#0f172a;
}

.custom-card{
    background:#fff;
    border-radius:22px;
    padding:25px;
    box-shadow:0 5px 20px rgba(0,0,0,.05);
    border:none;
}

.foto-preview{
    width:220px;
    height:170px;
    object-fit:cover;
    border-radius:15px;
    border:3px solid #e2e8f0;
}

.btn-custom{
    border-radius:10px;
    padding:10px 18px;
    font-weight:500;
}

</style>

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="page-title">
            Tambah Ekstrakurikuler
        </h2>

        <p class="text-muted mb-0">
            Tambahkan kegiatan ekstrakurikuler baru.
        </p>

    </div>

    <div class="custom-card">

        <form action="{{ route('ekstrakurikuler.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Foto
                    </label>

                    <input type="file"
                           name="foto"
                           class="form-control mb-3">

                    <div class="text-muted">
                        Belum ada foto
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nama Ekstrakurikuler
                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama') }}"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Pembina
                        </label>

                        <input type="text"
                               name="pembina"
                               class="form-control"
                               value="{{ old('pembina') }}">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Jadwal
                        </label>

                        <input type="text"
                               name="jadwal"
                               class="form-control"
                               value="{{ old('jadwal') }}"
                               placeholder="Contoh : Jumat 14.00 - 16.00">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="8"
                            class="form-control">{{ old('deskripsi') }}</textarea>

                    </div>

                </div>

            </div>

            <button type="submit"
                    class="btn btn-primary btn-custom">

                Simpan

            </button>

            <a href="{{ route('ekstrakurikuler.index') }}"
               class="btn btn-secondary btn-custom">

                Kembali

            </a>

        </form>

    </div>

</div>

</x-app-layout>