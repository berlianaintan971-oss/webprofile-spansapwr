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
        }

        .form-control{
            border-radius: 12px;
            padding: 12px;
        }

        textarea.form-control{
            min-height: 180px;
        }

        .btn-custom{
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
        }

        .preview-image{
            width: 220px;
            border-radius: 15px;
            margin-top: 15px;
            object-fit: cover;
        }

    </style>

    <div class="container-fluid">

        <!-- Header -->
        <div class="mb-4">

            <h2 class="page-title">
                Edit Berita
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi berita sekolah
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

            <form action="{{ route('berita.update', $berita->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-4">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul', $berita->judul) }}"
                           placeholder="Masukkan judul berita">

                </div>

                <!-- Isi -->
                <div class="mb-4">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              class="form-control"
                              placeholder="Masukkan isi berita">{{ old('isi', $berita->isi) }}</textarea>

                </div>

                <!-- Gambar -->
                <div class="mb-4">

                    <label class="form-label">
                        Gambar Berita
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(event)">

                    <!-- Preview Lama -->
                    @if($berita->gambar)

                        <div class="mt-3">

                            <p class="text-muted mb-2">
                                Gambar Saat Ini
                            </p>

                            <img src="{{ asset('gambar_berita/'.$berita->gambar) }}"
                                 class="preview-image"
                                 id="preview">

                        </div>

                    @else

                        <img id="preview"
                             class="preview-image d-none">

                    @endif

                </div>

                <!-- Button -->
                <div class="d-flex gap-2">

                    <button type="submit"
                            class="btn btn-primary btn-custom">

                        Update

                    </button>

                    <a href="{{ route('berita.index') }}"
                       class="btn btn-secondary btn-custom">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

    <script>

        function previewImage(event){

            const preview = document.getElementById('preview');

            preview.src = URL.createObjectURL(event.target.files[0]);

            preview.classList.remove('d-none');
        }

    </script>

</x-app-layout>