@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-lg bg-white rounded-lg shadow-md space-y-4">

    <h2 class="text-2xl font-bold text-gray-800">Edit/Ganti File Arsip Surat</h2>
    <p class="text-gray-600">
        Edit data arsip surat atau ganti file PDF jika diperlukan.
    </p>

    <form action="{{ route('arsip.update', $arsip) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nomor Surat -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nomor Surat</label>
            <input type="text" name="nomor_surat" value="{{ $arsip->nomor_surat }}" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <!-- Kategori -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Kategori</label>
            <select name="kategori_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $arsip->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Judul -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Judul</label>
            <input type="text" name="judul" value="{{ $arsip->judul }}" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
        </div>

        <!-- File Surat -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">File Surat (PDF)</label>
            <small class="block text-gray-500 mb-1">
                File lama: <a href="{{ Storage::url($arsip->lokasi_file) }}" target="_blank" class="text-blue-500 hover:underline">Lihat PDF</a>
            </small>
            <input type="file" name="file" accept="application/pdf" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400 mt-1">
        </div>

        <!-- Tombol aksi -->
        <div class="flex justify-between mt-4">
            <a href="{{ route('arsip.index') }}" 
               class="bg-red-400 hover:bg-red-500 text-black px-4 py-2 rounded-lg font-medium transition">
                Kembali
            </a>
            <button type="submit" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
