@extends('layouts.app')

@section('konten')
<h3>Arsip Surat >> Lihat</h3>
<p><b>Nomor:</b> {{ $arsip->nomor_surat }}</p>
<p><b>Kategori:</b> {{ $arsip->kategori->nama }}</p>
<p><b>Judul:</b> {{ $arsip->judul }}</p>
<p><b>Waktu Unggah:</b> {{ $arsip->created_at->format('Y-m-d H:i') }}</p>

<div style="border:1px solid #ccc; margin:15px 0;">
<iframe src="{{ asset('storage/'.$arsip->lokasi_file) }}" style="width:100%; height:500px;"></iframe>
</div>

<a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
<a href="{{ route('arsip.unduh',$arsip) }}" class="btn btn-success">Unduh</a>
<a href="{{ route('arsip.edit',$arsip) }}" class="btn btn-warning">Edit/Ganti File</a>
@endsection
