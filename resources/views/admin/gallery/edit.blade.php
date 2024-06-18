@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Gambar Gallery</h1>
    <h1>"{{ $image->keterangan }}"</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.gallery.form', ['action' => route('admin.gallery.update', $image->id), 'method' => 'PUT', 'gallery' => $image])
        </div>
    </div>
</div>
@endsection
