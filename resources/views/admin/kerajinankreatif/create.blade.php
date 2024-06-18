@extends('admin.index')
@section('admin.content')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Kerajinan Kreatif Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.kerajinankreatif.form', ['action' => route('admin.kerajinankreatif.store'), 'method' => 'POST', 'kerajinankreatif' => new App\Models\KerajinanKreatif])
        </div>
    </div>
</div>
@endsection