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

        .table th{
            background-color: #eff6ff;
            color: #2563eb;
            border: none;
        }

        .table td{
            vertical-align: middle;
        }

        .berita-image{
            width: 90px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-custom{
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 500;
        }

    </style>

    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="page-title">
                    Data Berita
                </h2>

                <p class="text-muted mb-0">
                    Kelola berita website sekolah
                </p>

            </div>

            <a href="{{ route('berita.create') }}"
               class="btn btn-primary btn-custom">

                + Tambah Berita

            </a>

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

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="70">No</th>

                            <th width="120">
                                Gambar
                            </th>

                            <th>
                                Judul
                            </th>

                            <th width="180">
                                Tanggal
                            </th>

                            <th width="180">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($berita as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if($item->gambar)

                                    <img src="{{ asset('gambar_berita/'.$item->gambar) }}"
                                         class="berita-image">

                                @else

                                    <span class="text-muted">
                                        Tidak ada
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $item->judul }}
                                </div>

                            </td>

                            <td>

                                {{ $item->created_at->format('d M Y') }}

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('berita.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm btn-custom">

                                        Edit

                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('berita.destroy', $item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm btn-custom"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5 text-muted">

                                Belum ada data berita

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->
            <div class="mt-4">

                {{ $berita->links() }}

            </div>

        </div>

    </div>

</x-app-layout>