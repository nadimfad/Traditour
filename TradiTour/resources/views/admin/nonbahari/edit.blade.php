@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Artikel Wisata Non Bahari</h1>
    <h1 class="h3 mb-2 text-gray-800">"{{ $nonBahari->judul }}"</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.nonbahari.form', ['action' => route('admin.nonbahari.update', $nonBahari->id_non_bahari), 'method' => 'PUT', 'nonbahari' => $nonBahari])
        </div>
    </div>
</div>
@endsection
