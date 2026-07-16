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

        #preview{
            width: 200px;
            border-radius: 15px;
            margin-top: 15px;
            display: none;
        }
    </style>

    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="page-title">
                Tambah Berita
            </h2>

            <p class="text-muted mb-0">
                Tambahkan berita terbaru sekolah
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="custom-card">

            <form action="{{ route('berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-4">
                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="{{ old('judul') }}"
                           placeholder="Masukkan judul berita">
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Tanggal Berita
                    </label>

                    <input type="date"
                           name="published_at"
                           class="form-control"
                           value="{{ old('published_at', date('Y-m-d')) }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea name="isi"
                              class="form-control"
                              placeholder="Masukkan isi berita">{{ old('isi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Gambar Berita
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control"
                           accept="image/*"
                           onchange="previewImage(event)">

                    <img id="preview">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit"
                            class="btn btn-primary btn-custom">
                        Simpan
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

            if(event.target.files[0]) {
                preview.src = URL.createObjectURL(event.target.files[0]);
                preview.style.display = 'block';
            }
        }
    </script>

</x-app-layout>