@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Tambah Seni Budaya Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
        @include('admin.senibudaya.form', ['action' => route('admin.senibudaya.store'), 'method' => 'POST', 'seniBudaya' => new App\Models\SeniBudaya]) 
        </div>
    </div>
</div>
@endsection
