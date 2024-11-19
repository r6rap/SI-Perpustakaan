@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Buku</h1>
        <a href="{{ route('bukus.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
        <form action="{{ route('bukus.index') }}" method="GET" class="mb-3">
            <label for="search">Cari</label>
            <input type="text" name="query" class="form-control" id="search" aria-describedby="search" placeholder="Cari judul atau penulis">
            <button type="submit" class="btn btn-primary mt-2">Cari</button>
        </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->kategori->nama }}</td>
                <td>
                    <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
    {{ $bukus->links('pagination::bootstrap-5') }}
    </div>


        @if($bukus->isEmpty())
            <tr>
                <td colspan="6" class="text-center">Tidak ada buku yang ditemukan untuk pencarian "{{ request('query') }}"</td>
            </tr>
        @endif
    </div>

    <!-- Modal -->
<div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus buku ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" action="" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest('form');
            const modal = new bootstrap.Modal(document.getElementById('confirmDelete'));
            modal.show();
            document.getElementById('deleteForm').action = form.action;
        });
    });
</script>

@endsection
