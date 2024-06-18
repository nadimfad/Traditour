@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tambah Wisata penginapan Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
    @include('admin.penginapan.form', ['action' => route('admin.penginapan.store'), 'method' => 'POST', 'penginapan' => new App\Models\Penginapan])
        </div>
    </div>
</div>
@endsection