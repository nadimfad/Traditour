@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third-party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Gallery Images</h6>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-success btn-sm">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambahkan Gambar</span>
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-3 mb-4">
                        <img src="{{ asset('images/' . $image->image) }}" alt="{{ $image->keterangan }}" style="width:100%; max-width:150px;">
                        <div class="mt-2">
                            <h4>{{ $image->keterangan }}</h4>
                            <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This action will delete the data. Proceed?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
