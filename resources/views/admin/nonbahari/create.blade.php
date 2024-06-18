@extends('admin.index')
@section('admin.content')
<div class="container-fluid"> 

    <h1 class="h3 mb-2 text-gray-800">Tambah Wisata NonBahari Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            @include('admin.nonbahari.form', ['action' => route('admin.nonbahari.store'), 'method' => 'POST', 'nonbahari' => new App\Models\Nonbahari])
        </div>
    </div>
</div>
@endsection
