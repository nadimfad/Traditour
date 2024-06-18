@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Edit Artikel Seni Budaya</h1>
    <h1 class="h3 mb-2 text-gray-800">"{{ $seniBudaya->judul }}"</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.senibudaya.form', ['action' => route('admin.senibudaya.update', $seniBudaya->id_seni_budaya), 'method' => 'PUT', 'nonbahari' => $seniBudaya])
        </div>
    </div>
</div>
@endsection
