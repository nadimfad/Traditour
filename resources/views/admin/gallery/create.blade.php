@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tambah Gambar Gallery Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.gallery.form', ['action' => route('admin.gallery.store'), 'method' => 'POST', 'gallery' => new App\Models\Gallery])
        </div>
    </div>
</div>
@endsection
