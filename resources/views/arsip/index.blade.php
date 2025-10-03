@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-7xl space-y-6">

    <!-- Deskripsi -->
    <p class="text-gray-600 mb-4">
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
        Klik ikon pada kolom aksi untuk melakukan tindakan.
    </p>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('arsip.index') }}" class="flex gap-2 mb-4">
        <input type="text" name="q" placeholder="Cari surat..." value="{{ $cari ?? '' }}"
            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
        <button type="submit"
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition transform hover:scale-105">
            Cari!
        </button>
    </form>

    <!-- Tabel Arsip -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-[800px] w-full table-auto text-center">
            <thead class="bg-green-50 text-gray-700">
                <tr>
                    <th class="py-3 px-4 w-1/5 text-left">Nomor Surat</th>
                    <th class="py-3 px-4 w-1/5 text-left">Kategori</th>
                    <th class="py-3 px-4 w-2/5 text-left">Judul</th>
                    <th class="py-3 px-4 w-1/5 text-left">Waktu Pengarsipan</th>
                    <th class="py-3 px-4 w-1/5">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($arsip as $a)
                <tr class="border-b hover:bg-green-50 transition">
                    <td class="py-2 px-4 text-left">{{ $a->nomor_surat }}</td>
                    <td class="py-2 px-4 text-left">{{ $a->kategori->nama }}</td>
                    <td class="py-2 px-4 text-left">{{ $a->judul }}</td>
                    <td class="py-2 px-4 text-left">{{ $a->created_at->format('Y-m-d H:i') }}</td>
                    <td class="py-2 px-4 flex justify-center gap-4">
                        <!-- Edit -->
                        <a href="{{ route('arsip.edit', $a) }}"
                           class="text-yellow-500 hover:text-yellow-600 transition" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z" />
                            </svg>
                        </a>

                        <!-- Hapus -->
                        <button type="button" data-modal-target="#hapusModal{{ $a->id }}"
                                class="text-red-500 hover:text-red-600 transition" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 7L5 7M6 7v12a2 2 0 002 2h8a2 2 0 002-2V7M10 11v6M14 11v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                            </svg>
                        </button>

                        <!-- Lihat -->
                        <a href="{{ route('arsip.show', $a) }}" class="text-blue-500 hover:text-blue-600 transition"
                           title="Lihat">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

                        <!-- Unduh -->
                        <a href="{{ route('arsip.unduh', $a) }}"
                           class="text-yellow-400 hover:text-yellow-500 transition" title="Unduh">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Belum ada arsip</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tombol Arsipkan Surat -->
    <div class="mt-4">
        <a href="{{ route('arsip.create') }}"
           class="px-6 py-4 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition transform hover:scale-105">
            Arsipkan Surat
        </a>
    </div>

    <!-- Modal Hapus -->
    @foreach($arsip as $a)
    <div id="hapusModal{{ $a->id }}" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-red-600">Konfirmasi Hapus</h3>
            </div>
            <div class="px-6 py-4 text-gray-700">
                Apakah Anda yakin ingin menghapus arsip surat <b>{{ $a->judul }}</b>?
            </div>
            <div class="px-6 py-4 flex justify-end space-x-2 border-t">
                <button onclick="document.getElementById('hapusModal{{ $a->id }}').classList.add('hidden')"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <form action="{{ route('arsip.destroy', $a) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Ya, Hapus!</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

</div>

@push('scripts')
<script>
document.querySelectorAll('[data-modal-target]').forEach(btn => {
    btn.addEventListener('click', e => {
        const modal = document.querySelector(btn.getAttribute('data-modal-target'));
        modal.classList.remove('hidden');
    });
});
</script>
@endpush

@endsection
