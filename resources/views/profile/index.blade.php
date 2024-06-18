@extends('tampilan.index')
@section('konten')
    <div class="profile">
        <img src="{{ asset('image/WhatsApp Image 2024-06-05 at 15.39.24.jpeg') }}" alt="login image" class="login__img">
        <div class="profile__form">
            <div class="profile-header" style="margin-top: 10px;">
                @if ($user->profile && $user->profile->profile_image)
                    <img src="{{ asset('images/' . $user->profile->profile_image) }}" alt="Gambar Profil" class="profile__img">
                @else
                    <img src="{{ asset('image/TRADITOUR.png') }}" alt="Gambar Profil" class="profile__img">
                @endif
                <h1 class="profile__name">{{ $user->profile->name ?? $user->username }}</h1>
                <h5 class="profile__username">{{ $user->username }}</h5>
                <p class="profile__email">Email: {{ $user->email }}</p>
            </div>
            <div class="profile-info">
                <h2 class="profile__info-title">Informasi Profil</h2>
                <p class="profile__bio">{{ $user->profile->description ?? 'Isi deskripsi singkat tentang diri Anda dan latar belakang Anda di sini.' }} </p>
            </div>
            <div class="d-flex justify-content-center mt-5 gap-3">
                <form action="{{ route('logout') }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Logout
                    </button>
                </form>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline-light">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
