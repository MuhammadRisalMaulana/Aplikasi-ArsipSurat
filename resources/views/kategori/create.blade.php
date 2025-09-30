@extends('layouts.app')

@section('konten')
<h3>Kategori Surat >> Tambah</h3>
<p>Tambahkan atau edit data kategori. Jika sudah selesai, klik tombol "Simpan".</p>

<form action="{{ route('kategori.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>ID (Auto Increment)</label>
    <input type="text" class="form-control" value="(otomatis)" disabled>
  </div>
  <div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
  </div>
  <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
