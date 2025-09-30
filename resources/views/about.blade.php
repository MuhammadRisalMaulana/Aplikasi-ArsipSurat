@extends('layouts.app')

@section('konten')
<h2>About</h2>
<p>Aplikasi ini dibuat oleh:</p>

<div class="d-flex align-items-center">
<img src="{{ asset('images/fotoprofil.JPG') }}" alt="Foto" width="120" class="me-3 border rounded">

  <div>
    <p><b>Nama :</b> Muhammad Risal Maulana</p>
    <p><b>Prodi :</b> D3-MI PSDKU Pamekasan</p>
    <p><b>NIM :</b> 2231750003</p>
    <p><b>Tanggal :</b> 26 Oktober 2003</p>
  </div>
</div>
@endsection
