@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>
    <a href="{{ route('pinjams.create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th> 
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pinjams as $pinjam)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pinjam->user->name }}</td>
            <td>{{ $pinjam->buku->judul }}</td>
            <td>{{ $pinjam->tgl_pinjam }}</td>
            <td>
                {{ $pinjam->tgl_kembali ? $pinjam->tgl_kembali : 'Belum Dikembalikan' }}
            </td>
            <td>{{ $pinjam->status }}</td>
            <td>
                <a href="{{ route('pinjams.edit', $pinjam) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pinjams.destroy', $pinjam) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</button>
                </form>
                <a href="{{ route('pinjams.showDetail', $pinjam) }}" class="btn btn-primary btn-sm">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
