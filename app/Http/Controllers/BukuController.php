<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query'); // Ambil kata kunci dari input pencarian

        if ($query) {
            // Jika ada kata kunci pencarian, lakukan pencarian pada kolom `judul` dan `penulis`
            $bukus = Buku::with('kategori')
                ->where('judul', 'LIKE', "%{$query}%")
                ->orWhere('penulis', 'LIKE', "%{$query}%")
                ->paginate(10); // Pagination dengan 10 data per halaman
        } else {
            // Jika tidak ada pencarian, tampilkan semua data buku dengan pagination
            $bukus = Buku::with('kategori')->paginate(10);
        }

        return view('bukus.index', compact('bukus'));
    }



    public function create()
    {
        $kategoris = Kategori::all();
        return view('bukus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
        ]);

        Buku::create($request->all());
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('bukus.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        $kategoris = Kategori::all();
        return view('bukus.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
        ]);

        $buku->update($request->all());
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
}
