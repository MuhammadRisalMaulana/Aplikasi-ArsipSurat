@extends('layouts.app')

@section('konten')
<h3>Arsip Surat >> Edit/Ganti File</h3>
<p>Edit data arsip surat atau ganti file PDF jika diperlukan.</p>

<form action="{{ route('arsip.update', $arsip) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="mb-3">
    <label>Nomor Surat</label>
    <input type="text" name="nomor_surat" class="form-control" value="{{ $arsip->nomor_surat }}" required>
  </div>

  <div class="mb-3">
    <label>Kategori</label>
    <select name="kategori_id" class="form-select" required>
      <option value="">-- Pilih Kategori --</option>
      @foreach($kategori as $k)
        <option value="{{ $k->id }}" {{ $arsip->kategori_id == $k->id ? 'selected' : '' }}>
          {{ $k->nama }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" value="{{ $arsip->judul }}" required>
  </div>

  <div class="mb-3">
    <label>File Surat (PDF)</label><br>
    <small>File lama: <a href="{{ Storage::url($arsip->lokasi_file) }}" target="_blank">Lihat PDF</a></small>
    <input type="file" name="file" class="form-control mt-2" accept="application/pdf">
  </div>

  <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
