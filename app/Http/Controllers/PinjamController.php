<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with('buku', 'user', 'pengembalian')->get();
    return view('pinjams.index', compact('pinjams'));
    }

    public function create()
    {
        $bukus = Buku::all();
        $users = User::all();
        return view('pinjams.create', compact('bukus', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'status' => 'required|in:pinjam,kembali',
        ]);

        $tgl_pinjam = $request->input('tgl_pinjam');
        $tgl_kembali = date('Y-m-d', strtotime($tgl_pinjam . ' +7 days'));

        Pinjam::create([
            'user_id' => $request->input('user_id'),
            'buku_id' => $request->input('buku_id'),
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('pinjams.index')->with('success', 'Pinjaman berhasil ditambahkan.');
    }


    public function show(Pinjam $pinjam)
    {
        return view('pinjams.show', compact('pinjam'));
    }

    public function edit(Pinjam $pinjam)
    {
        $bukus = Buku::all();
        $users = User::all();
        return view('pinjams.edit', compact('pinjam', 'bukus', 'users'));
    }

    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'user_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date',
            'status' => 'required|in:pinjam,kembali',
        ]);

        $pinjam->update($request->all());
        return redirect()->route('pinjams.index')->with('success', 'Pinjaman berhasil diperbarui.');
    }

    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();
        return redirect()->route('pinjams.index')->with('success', 'Pinjaman berhasil dihapus.');
    }

    public function showDetail($id)
    {
    $pinjam = Pinjam::with('user', 'buku', 'pengembalian')->findOrFail($id);
    return view('pinjams.detail', compact('pinjam'));
    }

}
