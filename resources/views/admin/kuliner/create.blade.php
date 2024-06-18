@extends('admin.index')
@section('admin.content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Kuliner Baru</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.kuliner.form', ['action' => route('admin.kuliner.store'), 'method' => 'POST', 'kuliner' => new App\Models\Kuliner])
        </div>
    </div>
</div>
@endsection


