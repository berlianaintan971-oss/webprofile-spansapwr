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
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border: none;
        }

        .form-label{
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select{
            border-radius: 12px;
            padding: 12px;
        }

        .btn-custom{
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
        }

        .preview-image{
            width: 180px;
            height: 240px;
            object-fit: cover;
            border-radius: 12px;
            border: 3px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0,0,0,.08);
        }

        .photo-box{
            background: #f8fafc;
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }

    </style>

    <div class="container-fluid">

        <!-- Header -->
        <div class="mb-4">

            <h2 class="page-title">
                Edit Guru & Staf
            </h2>

            <p class="text-muted mb-0">
                Perbarui data guru atau staf sekolah
            </p>

        </div>

        <!-- Error -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- Card -->
        <div class="custom-card">

            <form action="{{ route('guru.update', $guru->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- FORM -->
                    <div class="col-lg-8">

                        <!-- Nama -->
                        <div class="mb-4">

                            <label class="form-label">
                                Nama Guru / Staf
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ old('nama', $guru->nama) }}"
                                   placeholder="Masukkan nama">

                        </div>

                        <!-- Jabatan -->
                        <div class="mb-4">

                            <label class="form-label">
                                Jabatan
                            </label>

                            <input type="text"
                                   name="jabatan"
                                   class="form-control"
                                   value="{{ old('jabatan', $guru->jabatan) }}"
                                   placeholder="Contoh: Guru Matematika">

                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select name="kategori"
                                    class="form-select">

                                <option value="Kepala Sekolah"
                                    {{ $guru->kategori == 'Kepala Sekolah' ? 'selected' : '' }}>
                                    Kepala Sekolah
                                </option>

                                <option value="Guru"
                                    {{ $guru->kategori == 'Guru' ? 'selected' : '' }}>
                                    Guru
                                </option>

                                <option value="Staf Sekolah"
                                    {{ $guru->kategori == 'Staf Sekolah' ? 'selected' : '' }}>
                                    Staf Sekolah
                                </option>

                            </select>

                        </div>

                        <!-- Upload Foto -->
                        <div class="mb-4">

                            <label class="form-label">
                                Foto Guru
                            </label>

                            <input type="file"
                                   name="foto"
                                   class="form-control"
                                   accept="image/*"
                                   onchange="previewImage(event)">

                            <small class="text-muted">
                                Format JPG/PNG.
                                Disarankan rasio <b>3:4</b>
                                (600×800 px, 900×1200 px, atau 1200×1600 px).
                            </small>

                        </div>

                    </div>

                    <!-- PREVIEW -->
                    <div class="col-lg-4">

                        <div class="photo-box">

                            <h6 class="fw-bold mb-3">
                                Preview Foto
                            </h6>

                            @if($guru->foto)

                                <img
                                    src="{{ asset('foto_guru/'.$guru->foto) }}"
                                    id="preview"
                                    class="preview-image">

                            @else

                                <img
                                    id="preview"
                                    class="preview-image d-none">

                            @endif

                        </div>

                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary btn-custom">

                        Update Data

                    </button>

                    <a href="{{ route('guru.index') }}"
                       class="btn btn-secondary btn-custom">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

    <script>

        function previewImage(event){

            const preview =
                document.getElementById('preview');

            preview.src =
                URL.createObjectURL(event.target.files[0]);

            preview.classList.remove('d-none');
        }

    </script>

</x-app-layout>