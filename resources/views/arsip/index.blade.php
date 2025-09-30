@extends('layouts.app')

@section('konten')
<h2>Arsip Surat</h2>
<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
Klik <b>"Lihat"</b> pada kolom aksi untuk menampilkan surat.</p>

<form class="d-flex mb-3" method="GET" action="{{ route('arsip.index') }}">
  <input type="text" name="q" class="form-control me-2" placeholder="Cari surat..." value="{{ $cari ?? '' }}">
  <button class="btn btn-outline-primary">Cari!</button>
</form>

<table class="table table-bordered">
  <thead class="table-light">
    <tr>
      <th>Nomor Surat</th>
      <th>Kategori</th>
      <th>Judul</th>
      <th>Waktu Pengarsipan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($arsip as $a)
    <tr>
      <td>{{ $a->nomor_surat }}</td>
      <td>{{ $a->kategori->nama }}</td>
      <td>{{ $a->judul }}</td>
      <td>{{ $a->created_at->format('Y-m-d H:i') }}</td>
      <td>
        <!-- Tombol Hapus buka modal -->
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $a->id }}">
          Hapus
        </button>

        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="hapusModal{{ $a->id }}" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus arsip surat <b>{{ $a->judul }}</b>?</p>
              </div>
              <div class="modal-footer">
                <form action="{{ route('arsip.destroy',$a) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ route('arsip.unduh',$a) }}" class="btn btn-sm btn-warning">Unduh</a>
        <a href="{{ route('arsip.show',$a) }}" class="btn btn-sm btn-info text-white">Lihat >></a>
      </td>
    </tr>
    @empty
    <tr><td colspan="5" class="text-center">Belum ada arsip</td></tr>
    @endforelse
  </tbody>
</table>

<a href="{{ route('arsip.create') }}" class="btn btn-dark">Arsipkan Surat..</a>

{{-- konfirmasi hapus --}}
@push('scripts')
<script>
document.querySelectorAll('.hapus-form').forEach(form=>{
  form.addEventListener('submit', e=>{
    if(!confirm("Apakah Anda yakin ingin menghapus arsip surat ini?")) e.preventDefault();
  });
});
</script>
@endpush
@endsection
