@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-lg bg-white rounded-lg shadow-md">
    
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Edit Kategori Surat</h2>
    <p class="text-gray-600 mb-6">
        Edit data kategori. Jika sudah selesai, klik tombol <span class="font-semibold">"Simpan"</span>.
    </p>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- ID (Auto Increment) -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">ID (Auto Increment)</label>
            <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" value="{{ $kategori->id }}" disabled>
        </div>

        <!-- Nama Kategori -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Nama Kategori</label>
            <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}" 
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
        </div>

        <!-- Keterangan -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Keterangan</label>
            <textarea name="keterangan" rows="3" 
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('keterangan', $kategori->keterangan) }}</textarea>
        </div>

        <!-- Tombol aksi -->
        <div class="flex justify-between mt-4">
            <a href="{{ route('kategori.index') }}" 
               class="bg-red-400 hover:bg-red-500 text-black px-4 py-2 rounded-lg font-medium transition">
               Kembali
            </a>
            <button type="submit" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
