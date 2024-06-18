@extends('admin.index')
@section('admin.content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">List Tempat Penginapan</h6>
            <a href="{{ route('admin.penginapan.create') }}" class="btn btn-success btn-sm">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Tempat Penginapan Baru</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Harga (IDR)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penginapans as $key => $penginapan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $penginapan->nama_penginapan }}</td>
                                <td>{{ Str::limit($penginapan->deskripsi_penginapan, 50) }}</td>
                                <td>{{ $penginapan->alamat_penginapan }}</td>
                                <td><img src="{{ asset('images/' . $penginapan->gambar_penginapan) }}" alt="{{ $penginapan->nama_penginapan }}" style="width: 100px;"></td>
                                <td>{{ $penginapan->harga_penginapan }}</td>
                                <td>
                                    <a href="{{ route('admin.penginapan.edit', $penginapan->id_penginapan) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.penginapan.destroy', $penginapan->id_penginapan) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Kamu Yakin Inggin delete data ini?')">Delete</button>
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
