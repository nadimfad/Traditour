@extends('admin.index')
@section('admin.content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Artikel Kuliner </h1>
    <h1 class="h3 mb-2 text-gray-800">"{{ $kuliner->judul }}"</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.kuliner.form', ['action' => route('admin.kuliner.update', $kuliner->id_kuliner), 'method' => 'PUT', 'kuliner' => $kuliner])
        </div>
    </div>
</div>
@endsection
