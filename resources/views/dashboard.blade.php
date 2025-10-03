@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Header -->
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Dashboard Kelurahan Karang Duren</h2>
            <p class="text-gray-700 mt-1">Ringkasan data dan statistik arsip surat</p>
        </div>

        <!-- Statistik Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gray-100 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-gray-900">Total Arsip</h3>
                <p class="text-4xl font-bold mt-2 text-gray-900">{{ \App\Models\Arsip::count() }}</p>
                <p class="text-sm mt-1 text-gray-700">Jumlah semua surat yang diarsipkan</p>
            </div>
            <div class="bg-gray-100 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-gray-900">Kategori Surat</h3>
                <p class="text-4xl font-bold mt-2 text-gray-900">{{ \App\Models\Kategori::count() }}</p>
                <p class="text-sm mt-1 text-gray-700">Total kategori yang tersedia</p>
            </div>
            <div class="bg-gray-100 shadow-lg rounded-xl p-6 hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-gray-900">Pengguna</h3>
                <p class="text-4xl font-bold mt-2 text-gray-900">{{ \App\Models\User::count() }}</p>
                <p class="text-sm mt-1 text-gray-700">Jumlah akun terdaftar</p>
            </div>
        </div>

        <!-- Grafik Statistik Arsip -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistik Arsip per Bulan</h3>
            <canvas id="arsipChart" class="w-full h-64"></canvas>
        </div>

        <!-- Aksi Cepat -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('arsip.create') }}" class="px-5 py-3 bg-indigo-100 text-gray-900 font-semibold rounded-lg shadow hover:bg-indigo-200 transition-colors">Tambah Arsip</a>
                <a href="{{ route('arsip.index') }}" class="px-5 py-3 bg-green-100 text-gray-900 font-semibold rounded-lg shadow hover:bg-green-200 transition-colors">Lihat Arsip</a>
                <a href="{{ route('kategori.index') }}" class="px-5 py-3 bg-yellow-100 text-gray-900 font-semibold rounded-lg shadow hover:bg-yellow-200 transition-colors">Kelola Kategori</a>
            </div>
        </div>

    </div>
</div>

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('arsipChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Jumlah Arsip',
                data: [5, 10, 8, 12, 15, 20], // contoh data dummy
                backgroundColor: 'rgba(55, 65, 81, 0.7)', // lebih gelap
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false }},
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
