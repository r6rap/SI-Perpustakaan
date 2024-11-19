@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengembalian</h1>
    <form action="{{ route('pengembalians.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pinjam_id" class="form-label">Peminjaman</label>
            <select name="pinjam_id" class="form-control" required>
                <option value="">Pilih Peminjaman</option>
                @foreach ($pinjams as $pinjam)
                    <option value="{{ $pinjam->id }}">{{ $pinjam->user->name }} - {{ $pinjam->buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="denda" class="form-label">Denda (Opsional)</label>
            <input type="number" name="denda" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
