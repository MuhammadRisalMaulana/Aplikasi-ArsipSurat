<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{ // Halaman utama (index)
    public function index(Request $request)
    {
        $cari = $request->q;

        $arsip = Arsip::with('kategori')
            ->when($cari, function ($query) use ($cari) {
                $query->where('judul', 'like', "%$cari%");
            })
            ->latest()
            ->get();

        return view('arsip.index', compact('arsip', 'cari'));
    }

    // Halaman form tambah arsip
    public function create()
    {
        $kategori = Kategori::all(); // kirim kategori ke form
        return view('arsip.create', compact('kategori'));
    }

    // Simpan arsip baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $lokasiFile = $request->file('file')->store('arsip', 'public');


        Arsip::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'lokasi_file' => $lokasiFile
        ]);



        return redirect()->route('arsip.index')->with('sukses', 'Data berhasil disimpan!');
    }


    // Lihat detail arsip
    public function show(Arsip $arsip)
    {
        return view('arsip.show', compact('arsip'));
    }

    // Halaman edit arsip
    public function edit(Arsip $arsip)
    {
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    // Update arsip
    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);

        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;

        if ($request->hasFile('file')) {
            if ($arsip->lokasi_file && Storage::disk('public')->exists($arsip->lokasi_file)) {
                Storage::disk('public')->delete($arsip->lokasi_file);
            }
            $arsip->lokasi_file = $request->file('file')->store('arsip', 'public');
        }

        $arsip->save();

        return redirect()->route('arsip.index')->with('sukses', 'Data berhasil diperbarui!');

    }

    // Hapus arsip
    public function destroy(Arsip $arsip)
    {
        if ($arsip->lokasi_file && Storage::disk('public')->exists($arsip->lokasi_file)) {
            Storage::disk('public')->delete($arsip->lokasi_file);
        }
        $arsip->delete();

        return redirect()->route('arsip.index')->with('sukses', 'Data berhasil dihapus!');
    }

    // Unduh arsip PDF
    public function unduh(Arsip $arsip)
    {
        return Storage::disk('public')->download($arsip->lokasi_file, $arsip->judul . '.pdf');
    }
}
