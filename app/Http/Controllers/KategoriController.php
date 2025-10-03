<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
 // Ambil kata kunci pencarian
        $cari = $request->query('q');

        // Query kategori
        $kategoriQuery = Kategori::query();

        if ($cari) {
            $kategoriQuery->where('nama', 'like', "%{$cari}%")
                          ->orWhere('keterangan', 'like', "%{$cari}%");
        }

        // Pagination
        $kategori = $kategoriQuery->orderBy('nama')->paginate(10);
        $kategori->appends(['q' => $cari]); // agar query tetap ada di pagination

        return view('kategori.index', compact('kategori', 'cari'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'nama' => 'required|string|max:100|unique:kategori,nama',
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses','Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => "required|string|max:100|unique:kategori,nama,{$kategori->id}",
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        // opsi: cek apakah ada arsip terkait
        if ($kategori->arsip()->count()) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak dapat dihapus karena memiliki arsip.');
        }
        $kategori->delete();
        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil dihapus.');
    }
}
