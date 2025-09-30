@extends('layouts.app')

@section('konten')
<h3>Kategori Surat >> Edit</h3>

<form action="{{ route('kategori.update',$kategori) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>ID (Auto Increment)</label>
    <input type="text" class="form-control" value="{{ $kategori->id }}" disabled>
  </div>
  <div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}" required>
  </div>
  <div class="mb-3">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan', $kategori->keterangan) }}</textarea>
  </div>
  <a href="{{ route('kategori.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
