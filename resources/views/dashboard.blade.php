@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Dashboard Kelurahan Karang Duren
    </h2>
@endsection

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Statistik Card -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white shadow-lg rounded-xl p-6">
                <h3 class="text-lg font-semibold">Total Arsip</h3>
                <p class="text-4xl font-bold mt-2">{{ \App\Models\Arsip::count() }}</p>
                <p class="text-sm mt-2">Jumlah semua surat yang diarsipkan</p>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-xl p-6">
                <h3 class="text-lg font-semibold">Kategori Surat</h3>
                <p class="text-4xl font-bold mt-2">{{ \App\Models\Kategori::count() }}</p>
                <p class="text-sm mt-2">Total kategori yang tersedia</p>
            </div>
            <div class="bg-gradient-to-r from-pink-500 to-pink-700 text-white shadow-lg rounded-xl p-6">
                <h3 class="text-lg font-semibold">Pengguna</h3>
                <p class="text-4xl font-bold mt-2">{{ \App\Models\User::count() }}</p>
                <p class="text-sm mt-2">Jumlah akun terdaftar</p>
            </div>
        </div>

        <!-- Grafik / Chart Dummy -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Statistik Arsip per Bulan</h3>
            <canvas id="arsipChart" class="w-full h-64"></canvas>
        </div>

        <!-- Aksi Cepat -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('arsip.create') }}" class="px-5 py-3 bg-indigo-600 text-black font-semibold rounded-lg shadow hover:bg-indigo-700">
                    Tambah Arsip
                </a>
                <a href="{{ route('arsip.index') }}" class="px-5 py-3 bg-green-600 text-black font-semibold rounded-lg shadow hover:bg-green-700">
                    Lihat Arsip
                </a>
                <a href="{{ route('kategori.index') }}" class="px-5 py-3 bg-yellow-500 text-black font-semibold rounded-lg shadow hover:bg-yellow-600">
                Kelola Kategori
                </a>
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
                backgroundColor: 'rgba(99, 102, 241, 0.7)',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false }},
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
