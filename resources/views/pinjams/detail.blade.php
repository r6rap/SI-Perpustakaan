@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Struk Peminjaman Buku</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">Nama Peminjam</div>
                        <div class="col-md-8">{{ $pinjam->user->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">Judul Buku</div>
                        <div class="col-md-8">{{ $pinjam->buku->judul }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">Tanggal Pinjam</div>
                        <div class="col-md-8">{{ $pinjam->tgl_pinjam }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">Tanggal Kembali</div>
                        <div class="col-md-8">
                            @if($pinjam->pengembalian)
                                {{ $pinjam->pengembalian->tgl_kembali }}
                            @else
                                <span class="badge bg-warning text-dark">Belum Dikembalikan</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 text-muted">Status</div>
                        <div class="col-md-8">
                            <span class="badge {{ $pinjam->status == 'kembali' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($pinjam->status) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <p class="text-center" >Harap kembalikan sesuai dengan tanggal tertera</p>
                    <button onclick="window.print()" class="btn btn-primary">Print Detail</button>
                    <a href="{{ route('pinjams.index', $pinjam) }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS khusus untuk cetak -->
<style>
    @media print {
        /* Sembunyikan elemen tombol saja */
        .btn, .navbar {
            display: none !important;
        }

        /* Pastikan konten utama tetap terlihat */
        body * {
            visibility: hidden;
        }
        .container, .container * {
            visibility: visible;
        }
        
        /* Sesuaikan area cetak agar hanya menampilkan bagian container */
        .container {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            width: 100%; /* Sesuaikan lebar untuk cetakan */
            padding: 20px;
        }
    }
</style>


@endsection
