@extends('layouts.app')

@section('konten')
    <h3>Arsip Surat >> Unggah</h3>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
        <b>Catatan:</b> gunakan file berformat PDF.
    </p>

    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
  <label>Nomor Surat</label>
  <input type="text" name="nomor_surat" class="form-control" required>
</div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>File Surat (PDF)</label>
            <input type="file" name="file" class="form-control" accept="application/pdf" required>
        </div>
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
