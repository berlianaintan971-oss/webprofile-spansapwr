<x-app-layout>

    <style>
        .page-title{
            font-size: 30px;
            font-weight: 700;
            color: #0f172a;
        }

        .page-subtitle{
            color: #64748b;
        }

        .custom-card{
            background: white;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,.05);
            border: none;
        }

        .form-label{
            font-weight: 600;
            color: #334155;
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

        /* --- Perbaikan Kotak Placeholder & Preview --- */
        .preview-container {
            width: 180px;
            height: 240px; /* Rasio Pas 3:4 */
            margin: 0 auto;
            position: relative;
        }

        #preview-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            border: 3px dashed #cbd5e1;
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        #preview{
            width: 100%;
            height: 100%;
            object-fit: cover; /* Foto dijamin pas & tidak gepeng */
            border-radius: 15px;
            border: 3px solid #3b82f6;
            box-shadow: 0 5px 15px rgba(0,0,0,.08);
            display: none; /* Muncul via JS */
        }

        .upload-info{
            font-size: 13px;
            color: #64748b;
        }
    </style>

    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="page-title mb-1">Tambah Guru & Staf</h2>
            <div class="page-subtitle">
                Tambahkan data guru, staf sekolah, atau kepala sekolah
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-xl mb-4">
                <strong class="d-block mb-1">Terjadi kesalahan pendaftaran:</strong>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="custom-card">
            <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row align-items-start">

                    <div class="col-lg-8">

                        <div class="mb-4">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" placeholder="Contoh: Guru Kelas 1" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Kepala Sekolah" {{ old('kategori') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                <option value="Guru" {{ old('kategori') == 'Guru' ? 'selected' : '' }}>Guru</option>
                                <option value="Staf Sekolah" {{ old('kategori') == 'Staf Sekolah' ? 'selected' : '' }}>Staf Sekolah</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Upload Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" onchange="previewImage(event)" required>
                            
                            <div class="upload-info mt-2">
                                Format JPG / PNG. <br>
                                Disarankan rasio foto <strong>3 : 4</strong> <br>
                                Contoh ukuran: 600 x 800 px, 750 x 1000 px, atau 900 x 1200 px.
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0 text-center">
                        <label class="form-label d-block mb-3">Preview Foto Guru</label>
                        
                        <div class="preview-container">
                            <div id="preview-placeholder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-image text-muted mb-2" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M2.003 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                <span class="text-xs">Belum ada foto</span>
                            </div>

                            <img id="preview" alt="Pratinjau Foto">
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-custom shadow-sm">
                        Simpan Data
                    </button>
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary btn-custom">
                        Kembali
                    </a>
                </div>

            </form>
        </div>

    </div>

    <script>
        function previewImage(event) {
            const fileInput = event.target;
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('preview-placeholder');

            if (fileInput.files && fileInput.files[0]) {
                preview.src = URL.createObjectURL(fileInput.files[0]);
                
                // Sembunyikan simbol placeholder, tampilkan gambar utama
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            }
        }
    </script>

</x-app-layout>