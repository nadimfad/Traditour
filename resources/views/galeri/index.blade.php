@extends('tampilan.index')
@section('konten')

<header class="section__container header__container">
  <div class="header__image__container">
      <img src="{{ asset('image/pantai.png') }}" alt="Header Image" class="header__img">
      <div class="header__content">
          <h1>Galeri</h1>
          <p>Temukan Keindahan Alam Keragaman Budaya dan Kekayaan Laut dari Bumi Nyiur Melambai</p>
      </div>
  </div>
</header>
<div class="gallery-title text-dark">Galeri</div> 
 <div class="galery"> 
  @foreach($galeris as $galeri)
    <div class="card-img">
      <div class="caption">
        <p>{{ $galeri->keterangan }}</p>
      </div>
      <img src="{{ asset('images/' . $galeri->image) }}" class="custom-img" alt="town" />
    </div>
  @endforeach
</div>


@endsection