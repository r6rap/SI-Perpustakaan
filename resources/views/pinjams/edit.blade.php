@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>
    <form action="{{ route('pinjams.update', $pinjam) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Nama Peminjam</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $pinjam->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="buku_id" class="form-label">Judul Buku</label>
            <select name="buku_id" class="form-control" required>
                @foreach ($bukus as $buku)
                    <option value="{{ $buku->id }}" {{ $buku->id == $pinjam->buku_id ? 'selected' : '' }}>{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" value="{{ $pinjam->tgl_pinjam }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pinjam" {{ $pinjam->status == 'pinjam' ? 'selected' : '' }}>Pinjam</option>
                <option value="kembali" {{ $pinjam->status == 'kembali' ? 'selected' : '' }}>Kembali</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
