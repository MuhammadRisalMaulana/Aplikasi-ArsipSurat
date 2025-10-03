@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-6xl">

    <!-- Header -->

    <!-- Grid 2 card berdampingan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col md:flex-row items-center md:items-start gap-6">
            <!-- Foto -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/fotoprofil.JPG') }}" alt="Foto Profil" class="w-20 h-22 rounded-lg object-cover">
            </div>
            <!-- Info -->
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Pengembang Aplikasi</h2>
                <p class="text-gray-700 mb-3"><span class="font-semibold">Nama :</span> Muhammad Risal Maulana</p>
                <p class="text-gray-700 mb-3"><span class="font-semibold">Prodi :</span> D3-MI PSDKU Pamekasan</p>
                <p class="text-gray-700 mb-3"><span class="font-semibold">NIM :</span> 2231750003</p>
                <p class="text-gray-700"><span class="font-semibold">Tanggal :</span> 3 Oktober 2025</p>
            </div>
        </div>

        <!-- Card Informasi Aplikasi -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tentang Aplikasi</h2>
            <p class="text-gray-700 mb-4">
                Aplikasi Sistem Manajemen Arsip ini dikembangkan untuk memberikan solusi digital dalam pengelolaan dokumen surat. 
                Dengan antarmuka yang intuitif dan fitur yang lengkap, aplikasi ini memudahkan pengguna dalam menyimpan, 
                mengategorikan, dan menemukan dokumen dengan cepat dan efisien.
            </p>
            <div class="border-t border-gray-200 my-4"></div>

            <!-- Fitur Utama -->
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Fitur Utama</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Upload Arsip</li>
                <li>Dashboard Statistik</li>
                <li>Manajemen Kategori</li>
                <li>Pencarian Cepat</li>
            </ul>
        </div>
        
    </div>
</div>
@endsection
