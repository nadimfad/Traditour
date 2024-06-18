@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Artikel Wisata Bahari</h1>
    <h1 class="h3 mb-2 text-gray-800">"{{ $bahari->judul }}"</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.bahari.form', ['action' => route('admin.bahari.update', $bahari->id_bahari), 'method' => 'PUT', 'bahari' => $bahari])
        </div>
    </div>
</div>
@endsection
