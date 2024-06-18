@extends('tampilan.index')

@section('konten')

<header class="section__container header__container">
  <div class="header__image__container">
      <img src="{{ asset('image/hotel.jpg') }}" alt="Header Image" class="header__img">
      <div class="header__content">
          <h1>Nikmati Liburan Impian Anda</h1>
          <p>Pilihlah Hotel Terdekat dari Tempat Wisata Anda</p>
      </div>
  </div>
</header>

<section class="section__container popular__container p-4">
    <h2 class="section__header">Popular Hotels</h2>

    <!-- Search form -->
    <form action="{{ route('penginapan') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ $query }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
    <div class="popular__grid">
        @foreach ($penginapans as $penginapan)
            <a href="{{ route('showpenginapan', $penginapan->id_penginapan) }}" class="popular__card">
                <img src="{{ asset('images/' . $penginapan->gambar_penginapan) }}" alt="{{ $penginapan->nama_penginapan }}" />
                <div class="popular__content">
                    <div class="popular__card__header">
                        <h4>{{ $penginapan->nama_penginapan }}</h4>
                        <h4>{{ $penginapan->harga_penginapan }} IDR/Night</h4>
                    </div>
                    <p>{{ $penginapan->alamat_penginapan }}</p>
                    <p class="text-dark">{{ Str::limit($penginapan->deskripsi_penginapan, 50) }}</p>
                </div>
            </a>
        @endforeach
    </div>
</section>

@endsection