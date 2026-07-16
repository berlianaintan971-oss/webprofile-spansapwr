<x-app-layout>

    <style>

        .page-title{
            font-size: 32px;
            font-weight: 700;
            color: #0f172a;
        }

        .page-subtitle{
            color: #64748b;
        }

        .custom-card{
            background: #ffffff;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,.05);
            border: none;
        }

        .table th{
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
            border: none;
            padding: 15px;
        }

        .table td{
            vertical-align: middle;
            padding: 15px;
        }

        .guru-image{
            width: 90px;
            height: 120px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            box-shadow: 0 4px 10px rgba(0,0,0,.08);
        }

        .btn-custom{
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 500;
        }

        .badge-kategori{
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
        }

        .kepala{
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .guru{
            background-color: #dcfce7;
            color: #15803d;
        }

        .staf{
            background-color: #fef3c7;
            color: #b45309;
        }

        .nama-guru{
            font-weight: 600;
            color: #0f172a;
        }

        .jabatan{
            color: #64748b;
            font-size: 14px;
        }

        .action-btn{
            border-radius: 10px;
            font-size: 14px;
            padding: 7px 14px;
        }

        .empty-state{
            padding: 60px 20px;
            text-align: center;
            color: #94a3b8;
        }

    </style>

    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="page-title mb-1">
                    Data Guru & Staf
                </h2>

                <div class="page-subtitle">
                    Kelola data guru, staf sekolah dan kepala sekolah
                </div>

            </div>

            <a href="{{ route('guru.create') }}"
               class="btn btn-primary btn-custom">

                + Tambah Data

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

        <!-- Table -->
        <div class="custom-card">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th width="140">
                                Foto
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Jabatan
                            </th>

                            <th width="180">
                                Kategori
                            </th>

                            <th width="200">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($guru as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if($item->foto)

                                    <img
                                        src="{{ asset('foto_guru/'.$item->foto) }}"
                                        class="guru-image">

                                @else

                                    <span class="text-muted small">
                                        Tidak ada foto
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="nama-guru">
                                    {{ $item->nama }}
                                </div>

                            </td>

                            <td>

                                <div class="jabatan">
                                    {{ $item->jabatan }}
                                </div>

                            </td>

                            <td>

                                @if($item->kategori == 'Kepala Sekolah')

                                    <span class="badge-kategori kepala">
                                        Kepala Sekolah
                                    </span>

                                @elseif($item->kategori == 'Guru')

                                    <span class="badge-kategori guru">
                                        Guru
                                    </span>

                                @else

                                    <span class="badge-kategori staf">
                                        Staf Sekolah
                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('guru.edit', $item->id) }}"
                                       class="btn btn-warning action-btn">

                                        Edit

                                    </a>

                                    <form action="{{ route('guru.destroy', $item->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger action-btn"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <h5>
                                        Belum Ada Data Guru
                                    </h5>

                                    <p>
                                        Silakan tambahkan data guru atau staf sekolah terlebih dahulu.
                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->
            <div class="mt-4">

                {{ $guru->links() }}

            </div>

        </div>

    </div>

</x-app-layout>