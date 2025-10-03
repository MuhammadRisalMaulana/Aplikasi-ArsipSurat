@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-2xl space-y-6">

    <!-- Header -->
    <h2 class="text-2xl font-bold text-gray-800">Arsip Surat >> Unggah</h2>
    <p class="text-gray-600">
        Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        <b>Catatan:</b> gunakan file berformat PDF.
    </p>

    <!-- Form Unggah -->
    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow">
        @csrf

        <!-- Nomor Surat -->
        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <!-- Kategori -->
        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Kategori</label>
            <select name="kategori_id" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Judul -->
        <div class="flex flex-col">
            <label class="mb-1 font-semibold">Judul</label>
            <input type="text" name="judul" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <!-- File PDF -->
        <div class="flex flex-col">
            <label class="mb-1 font-semibold">File Surat (PDF)</label>
            <input type="file" name="file" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400" accept="application/pdf" required>
        </div>

        <!-- Tombol -->
        <div class="flex gap-3 mt-4">
            <a href="{{ route('arsip.index') }}"
               class="px-4 py-2 bg-blue-500 text-black rounded-lg hover:bg-gray-600 transition font-semibold">
               Kembali
            </a>
            <button type="submit"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition font-semibold">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
