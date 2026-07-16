<x-app-layout>

    <style>

        body{
            background-color: #f1f5f9;
        }

        .dashboard-title{
            font-size: 32px;
            font-weight: 700;
            color: #1e293b;
        }

        .dashboard-subtitle{
            color: #64748b;
            font-size: 15px;
        }

        .hero-box{
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 25px;
            padding: 35px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-box::before{
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            top: -50px;
            right: -50px;
        }

        .hero-title{
            font-size: 28px;
            font-weight: bold;
        }

        .hero-text{
            opacity: 0.9;
            max-width: 700px;
        }

        .info-card{
            background: white;
            border-radius: 22px;
            padding: 25px;
            border: none;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .info-card:hover{
            transform: translateY(-5px);
        }

        .info-title{
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .info-value{
            font-size: 35px;
            font-weight: bold;
            color: #0f172a;
        }

        .clock-card{
            background: white;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .clock-time{
            font-size: 38px;
            font-weight: bold;
            color: #2563eb;
        }

        .section-card{
            background: white;
            border-radius: 22px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .section-title{
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

        .table{
            margin-top: 20px;
        }

        .table thead tr{
            background-color: #eff6ff;
        }

        .table th{
            color: #2563eb;
            border: none;
        }

        .table td{
            border-color: #f1f5f9;
        }

        .badge-status{
            padding: 8px 15px;
            border-radius: 30px;
            background-color: #dbeafe;
            color: #2563eb;
            font-size: 13px;
            font-weight: 600;
        }

    </style>

    <div class="container-fluid">

        <!-- Hero -->
        <div class="hero-box mb-4">

            <div class="hero-title mb-2">
                Halo, {{ Auth::user()->name }} 👋
            </div>

            <div class="hero-text">
                Selamat datang di dashboard admin website
                SMP NEGRI 1 PURWOREJO.
                Anda dapat mengelola berita sekolah,
                guru & staf, visi misi, akreditasi,
                serta banner PPDB melalui halaman ini.
            </div>

        </div>

        <!-- Statistik -->
        <div class="row mb-4">

            <div class="col-md-3 mb-3">

                <div class="info-card">

                    <div class="info-title">
                        Total Berita
                    </div>

                    <div class="info-value">
                        {{ $jumlahBerita }}
                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="info-card">

                    <div class="info-title">
                        Total Guru
                    </div>

                    <div class="info-value">
                        {{ $jumlahGuru }}
                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="info-card">

                    <div class="info-title">
                        Akreditasi
                    </div>

                    <div class="info-value">
                        {{ $akreditasi->nilai_akreditasi ?? '-' }}
                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="info-card">

                    <div class="info-title">
                        Status PPDB
                    </div>

                    <div class="mt-3">
                        <span class="badge-status">
                            {{ $ppdb ? 'Banner Aktif' : 'Belum Ada Banner' }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <!-- Jam -->
        <div class="clock-card mb-4">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h5 class="fw-bold mb-2">
                        Waktu Saat Ini
                    </h5>

                    <div id="tanggal" class="text-muted"></div>

                </div>

                <div class="col-md-6 text-md-end">

                    <div id="jam" class="clock-time"></div>

                </div>

            </div>

        </div>

        <!-- Berita -->
        <div class="section-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <div class="section-title">
                        Berita Terbaru
                    </div>

                    <div class="text-muted">
                        Informasi berita terbaru sekolah
                    </div>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>
                            <th width="80">No</th>
                            <th>Judul Berita</th>
                            <th width="200">Tanggal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($beritaTerbaru as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->judul }}
                            </td>

                            <td>
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center py-4">
                                Belum ada berita terbaru
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>

        function updateJam() {

            const now = new Date();

            const hari = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            const jam = now.toLocaleTimeString('id-ID');

            document.getElementById('tanggal').innerHTML = hari;
            document.getElementById('jam').innerHTML = jam;
        }

        updateJam();

        setInterval(updateJam, 1000);

    </script>

</x-app-layout>