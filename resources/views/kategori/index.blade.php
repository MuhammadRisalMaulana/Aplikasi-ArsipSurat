@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-7xl">

        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Kategori Surat</h2>
        <p class="text-gray-600 mb-6">
            Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
            Klik <span class="font-semibold">"Tambah"</span> pada kolom aksi untuk menambahkan kategori baru.
        </p>

        <!-- Form Pencarian -->
        <form class="flex flex-col md:flex-row gap-2 mb-6" method="GET" action="{{ route('kategori.index') }}">
            <input type="text" name="q"
                class="px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 flex-1"
                placeholder="Cari kategori..." value="{{ $cari ?? '' }}">
            <button
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg transition">Cari!</button>
        </form>

        <!-- Tabel Kategori -->
        <div class="overflow-x-auto border rounded-lg shadow">
            <table class="min-w-[800px] w-full table-auto text-center">
                <thead class="bg-blue-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4 w-16">No</th>
                        <th class="py-3 px-4 w-1/4">Nama Kategori</th>
                        <th class="py-3 px-4 w-1/2">Keterangan</th>
                        <th class="py-3 px-4 w-1/4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $index => $k)
                        <tr class="border-b hover:bg-blue-50 transition">
                            <td class="py-2 px-4">{{ $kategori->firstItem() + $index }}</td>
                            <td class="py-2 px-4">{{ $k->nama }}</td>
                            <td class="py-2 px-4">{{ $k->keterangan ?: '-' }}</td>
                            <td class="py-2 px-4 flex justify-center items-center gap-4">
                                <!-- Tombol Edit (ikon pensil) -->
                                <a href="{{ route('kategori.edit', $k) }}"
                                    class="text-yellow-500 hover:text-yellow-600 transition" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z" />
                                    </svg>
                                </a>

                                <!-- Tombol Hapus (ikon trash) -->
                                <form action="{{ route('kategori.destroy', $k) }}" method="POST" class="inline hapus-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 transition"
                                        title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7L5 7M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M10 11v6M14 11v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($kategori->hasPages())
            <div class="mt-4">
                {{ $kategori->links() }}
            </div>
        @endif

        <!-- Tambah Kategori -->
        <div class="mt-6 flex justify-left">
            <a href="{{ route('kategori.create') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-4 rounded-lg font-bold text-lg shadow-lg transition transform hover:scale-105">
                Tambah Kategori Baru
            </a>
        </div>

    </div>

   @push('scripts')
<script>
document.querySelectorAll('.hapus-form').forEach(form => {
    form.addEventListener('submit', e => {
        if(!confirm("Apakah yakin ingin menghapus kategori ini?")) {
            e.preventDefault();
        }
    });
});
</script>
@endpush
@endsection