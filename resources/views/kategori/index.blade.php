@extends('layouts.app')

@section('konten')
<h2>Kategori Surat</h2>
<p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>
Klik <b>"Tambah"</b> pada kolom aksi untuk menambahkan kategori baru.</p>

<!-- Form Pencarian -->
<form class="d-flex mb-3" method="GET" action="{{ route('kategori.index') }}">
  <input type="text" name="q" class="form-control me-2" placeholder="Cari kategori..." value="{{ $cari ?? '' }}">
  <button class="btn btn-outline-primary">Cari!</button>
</form>

<!-- Tabel Kategori -->
<table class="table table-bordered table-striped">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Nama Kategori</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($kategori as $index => $k)
    <tr>
      <td>{{ $kategori->firstItem() + $index }}</td>
      <td>{{ $k->nama }}</td>
      <td>{{ $k->keterangan ?: '-' }}</td>
      <td>
        <a href="{{ route('kategori.edit', $k) }}" class="btn btn-sm btn-info">Edit</a>
        <form action="{{ route('kategori.destroy', $k) }}" method="POST" class="d-inline hapus-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4" class="text-center">Belum ada kategori</td>
    </tr>
    @endforelse
  </tbody>
</table>

<!-- Pagination -->
@if($kategori->hasPages())
<div class="mt-3">
  {{ $kategori->links() }}
</div>
@endif

<!-- Tambah Kategori -->
<a href="{{ route('kategori.create') }}" class="btn btn-success mt-2">[ + ] Tambah Kategori Baru</a>

@push('scripts')
<script>
document.querySelectorAll('.hapus-form').forEach(form => {
  form.addEventListener('submit', e => {
    if(!confirm("Apakah yakin ingin menghapus kategori ini?")) e.preventDefault();
  });
});
</script>
@endpush

@endsection
