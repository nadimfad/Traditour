@extends('admin.index')
@section('admin.content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">List User Terdaftar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Gambar Profil</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Forum</th>
                            <th>Jumlah Komentar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{$user->profile->name ?? $user->username}}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->profile && $user->profile->profile_image)
                                        <img style="width: 100px;" src="{{ asset('images/' . $user->profile->profile_image) }}" alt="Profile Image">
                                    @else
                                        <img src="{{ asset('image/TRADITOUR.png') }}" alt="Gambar Profil" style="width: 100px;">
                                    @endif
                                </td>
                                <td>{{ $user->profile->description ?? 'Isi deskripsi singkat tentang diri Anda dan latar belakang Anda di sini.' }}</td>
                                <td>{{ $user->forums->count() }}</td>
                                <td>{{ $user->comments->count() }}</td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('This action will delete the data. Proceed?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
