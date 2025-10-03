@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl space-y-6">

        <!-- Header -->
        <h1 class="text-2xl font-bold text-gray-800">Arsip Surat >> Lihat</h1>

        <!-- Info Surat -->
        <div class="bg-white p-6 rounded-lg shadow space-y-2">
            <p><span class="font-semibold">Nomor:</span> {{ $arsip->nomor_surat }}</p>
            <p><span class="font-semibold">Kategori:</span> {{ $arsip->kategori->nama }}</p>
            <p><span class="font-semibold">Judul:</span> {{ $arsip->judul }}</p>
            <p><span class="font-semibold">Waktu Unggah:</span> {{ $arsip->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <div style="border:1px solid #ccc; margin:15px 0;">
            <iframe src="{{ asset('storage/' . $arsip->lokasi_file) }}" style="width:100%; height:500px;"></iframe>
        </div>

        <div class="flex gap-4 mt-4">
            <a href="{{ route('arsip.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-semibold">
                Kembali
            </a>
            <a href="{{ route('arsip.unduh', $arsip) }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-green-600 transition flex items-center gap-1"
                title="Unduh">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                </svg>
                Unduh
            </a>
            <a href="{{ route('arsip.edit', $arsip) }}"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-semibold">
                Edit/Ganti File
            </a>
        </div>
    @endsection
