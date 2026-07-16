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

    .table img{
        width:90px;
        height:70px;
        object-fit:cover;
        border-radius:10px;
    }

    .btn-custom{
        border-radius:10px;
        padding:10px 18px;
        font-weight:500;
    }

</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title">
                Data Ekstrakurikuler
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh kegiatan ekstrakurikuler sekolah.
            </p>

        </div>

        <a href="{{ route('ekstrakurikuler.create') }}"
           class="btn btn-primary btn-custom">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Ekstrakurikuler

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <div class="custom-card">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">No</th>
                        <th width="120">Foto</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Pembina</th>
                        <th>Jadwal</th>
                        <th width="170" class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($ekstrakurikulers as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>

                            @if($item->foto)

                                <img src="{{ asset('storage/'.$item->foto) }}">

                            @else

                                <span class="text-muted">
                                    Tidak ada
                                </span>

                            @endif

                        </td>

                        <td>

                            <strong>
                                {{ $item->nama }}
                            </strong>

                        </td>

                        <td>

                            {{ $item->pembina }}

                        </td>

                        <td>

                            {{ $item->jadwal }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('ekstrakurikuler.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form action="{{ route('ekstrakurikuler.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-5 text-muted">

                            Belum ada data ekstrakurikuler.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-app-layout>