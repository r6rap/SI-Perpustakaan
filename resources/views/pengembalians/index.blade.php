@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pengembalian</h1>
    <a href="{{ route('pengembalians.create') }}" class="btn btn-primary mb-3">Tambah Pengembalian</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengembalians as $pengembalian)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengembalian->pinjam->user->name }}</td>
                <td>{{ $pengembalian->pinjam->buku->judul }}</td>
                <td>{{ $pengembalian->tgl_kembali }}</td>
                <td>{{ $pengembalian->denda ?? 'Tidak Ada' }}</td>
                <td>
                    <a href="{{ route('pengembalians.edit', $pengembalian) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pengembalians.destroy', $pengembalian) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
