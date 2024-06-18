@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Data Penginapan {{ $penginapan->nama_penginapan }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.penginapan.form', ['action' => route('admin.penginapan.update', $penginapan->id_penginapan), 'method' => 'PUT', 'penginapan' => $penginapan])
        </div>
    </div>
</div>
@endsection
