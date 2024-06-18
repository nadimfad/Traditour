@extends('admin.index')
@section('admin.content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Kerajinan Kreatif Bahari </h1>
    <h1 class="h3 mb-2 text-gray-800">"{{ $kerajinanKreatif->judul }}"</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.kerajinankreatif.form', ['action' => route('admin.kerajinankreatif.update', $kerajinanKreatif->id_kerajinan_kreatif), 'method' => 'PUT', 'kerajinankreatif' => $kerajinanKreatif])
        </div>
    </div>
</div>
@endsection


