@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ route('pinjams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Nama Peminjam</label>
            <select name="user_id" class="form-control" required>
                <option value="">Pilih Peminjam</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="buku_id" class="form-label">Judul Buku</label>
            <select name="buku_id" class="form-control" required>
                <option value="">Pilih Buku</option>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pinjam">Pinjam</option>
                <option value="kembali">Kembali</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
