<?php
namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with('pinjam')->get();
        return view('pengembalians.index', compact('pengembalians'));
    }

    public function create()
    {
        $pinjams = Pinjam::where('status', 'pinjam')->get();  // Hanya menampilkan peminjaman yang statusnya 'pinjam'
        return view('pengembalians.create', compact('pinjams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pinjam_id' => 'required',
            'tgl_kembali' => 'required|date',
            'denda' => 'nullable|integer',
        ]);

        Pengembalian::create($request->all());

        // Update status pinjam menjadi 'kembali'
        $pinjam = Pinjam::findOrFail($request->pinjam_id);
        $pinjam->update(['status' => 'kembali']);

        return redirect()->route('pengembalians.index')->with('success', 'Pengembalian berhasil ditambahkan.');
    }

    public function show(Pengembalian $pengembalian)
    {
        return view('pengembalians.show', compact('pengembalian'));
    }

    public function edit(Pengembalian $pengembalian)
    {
        $pinjams = Pinjam::all();
        return view('pengembalians.edit', compact('pengembalian', 'pinjams'));
    }

    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'pinjam_id' => 'required',
            'tgl_kembali' => 'required|date',
            'denda' => 'nullable|integer',
        ]);

        $pengembalian->update($request->all());

        return redirect()->route('pengembalians.index')->with('success', 'Pengembalian berhasil diperbarui.');
    }

    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();
        return redirect()->route('pengembalians.index')->with('success', 'Pengembalian berhasil dihapus.');
    }
}
