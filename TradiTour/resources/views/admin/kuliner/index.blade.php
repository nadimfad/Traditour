@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">List Kuliner</h6>
            <a href="{{ route('admin.kuliner.create') }}" class="btn btn-success btn-sm">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Kuliner Baru</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Isi Artikel</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kuliners as $key => $kuliner)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $kuliner->judul }}</td>
                                <td><img src="{{ asset('images/' . $kuliner->gambar) }}" alt="{{ $kuliner->judul }}" style="width: 100px;"></td>
                                <td>{{ Str::limit($kuliner->artikel, 50) }}</td>
                                <td>
                                    <a href="{{ route('admin.kuliner.edit', $kuliner->id_kuliner) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.kuliner.destroy', $kuliner->id_kuliner) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This action will delete the data. Proceed?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
