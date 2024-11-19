@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Selamat datang di Sistem Informasi Perpustakaan</h1>
        <p>Gunakan menu di atas untuk mengelola data peminjaman buku</p>
        <p>Anda berhasil login sebagai <strong>{{ Auth::user()->name }}</strong></p>
        
        <hr>
        
        <h2>Tentang Kami</h2>
        <p>Sistem Informasi Perpustakaan ini dirancang untuk memudahkan pengelolaan peminjaman buku di perpustakaan. Dengan sistem ini, Anda dapat dengan mudah menambah, mengedit, dan menghapus data peminjaman serta melacak status buku yang dipinjam.</p>

        <h2>Fitur Utama</h2>
        <ul>
            <li><strong>Peminjaman Buku:</strong> Daftar dan kelola peminjaman buku secara efisien.</li>
            <li><strong>Pengembalian Buku:</strong> Catat pengembalian buku dan perbarui status peminjaman.</li>
            <li><strong>Pengelolaan Pengguna:</strong> Kelola data pengguna yang meminjam buku di perpustakaan.</li>
        </ul>

        <h2>Petunjuk Penggunaan</h2>
        <p>Untuk mulai menggunakan sistem ini, silakan pilih salah satu menu di atas. Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi petugas perpustakaan.</p>
    </div>
@endsection
