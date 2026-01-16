@extends('layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-2 text-white">Selamat Datang {{ Auth::user()->name }} ! 👋</h3>
                            <p class="mb-0 text-white-50">Semoga hari Anda menyenangkan dan produktif</p>
                        </div>
                        <div class="text-end">
                            <h4 class="mb-1 text-white" id="current-time"></h4>
                            <p class="mb-0 text-white-50" id="current-date"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Kategori A</h6>
                            <h3 class="mb-0 fw-bold">{{ $data['kategori']['a'] }}</h3>
                        </div>
                        <div>
                            <i class="fa-solid fa-folder text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Kategori B</h6>
                            <h3 class="mb-0 fw-bold">{{ $data['kategori']['b'] }}</h3>
                        </div>
                        <div>
                            <i class="fa-solid fa-folder text-success" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Kategori C</h6>
                            <h3 class="mb-0 fw-bold">{{ $data['kategori']['c'] }}</h3>
                        </div>
                        <div>
                            <i class="fa-solid fa-folder text-warning" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary">
                    <h5 class="text-white mb-0">
                        <i class="fa-solid fa-list me-2"></i>5 Produk dengan Stok Terbanyak
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th class="text-end">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['produk_stok'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td class="text-end">{{ number_format($item->stok, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success">
                    <h5 class="text-white mb-0">
                        <i class="fa-solid fa-circle-up me-2"></i>5 Produk dengan Harga Tertinggi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th class="text-end">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data['produk_harga'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td class="text-end">{{ \App\Helpers\Money::stringToRupiah($item->harga) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function updateTime() {
            const now = new Date();

            const timeOptions = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            const timeString = now.toLocaleTimeString('id-ID', timeOptions);

            const dateOptions = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const dateString = now.toLocaleDateString('id-ID', dateOptions);

            document.getElementById('current-time').textContent = timeString;
            document.getElementById('current-date').textContent = dateString;
        }

        updateTime();
        setInterval(updateTime, 1000);
    </script>
@endsection
