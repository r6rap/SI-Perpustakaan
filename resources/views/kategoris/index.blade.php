@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kategori</h1>
        <a href="{{ route('kategoris.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategoris.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
