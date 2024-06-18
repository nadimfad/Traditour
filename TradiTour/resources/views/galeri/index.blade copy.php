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
     <div class="card-img">
      <div class="caption">
        <p>Kota Jakarta</p>
      </div>
      <img
        src="{{ asset('image/alam.jpg') }}"
        class="custom-img"
        alt="town"
      />
    </div>
    <div class="card-img">
        <div class="caption">
          <p>Kota Jakarta</p>
        </div>
        <img
          src="{{ asset('image/alam.jpg') }}"
          class="custom-img"
          alt="town"
        />
      </div>
      <div class="card-img">
        <div class="caption">
          <p>Kota Jakarta</p>
        </div>
        <img
          src="{{ asset('image/alam.jpg') }}"
          class="custom-img"
          alt="town"
        />
      </div>
      <div class="card-img">
        <div class="caption">
          <p>Kota Jakarta</p>
        </div>
        <img
          src="{{ asset('image/alam.jpg') }}"
          class="custom-img"
          alt="town"
        />
      </div>
      <div class="card-img">
        <div class="caption">
          <p>Kota Jakarta</p>
        </div>
        <img
          src="{{ asset('image/alam.jpg') }}"
          class="custom-img"
          alt="town"
        />
      </div>
    <div class="card-img">
      <div class="caption">
        <p>Kota Medan</p>
      </div>
      <img src="{{ asset('image/hotel.jpg') }}" class="custom-img" alt="town" />
    </div>
    <div class="card-img">
      <div class="caption">
        <p>Kota Bandung</p>
      </div>
      <img
        src="{{ asset('image/sembalun.jpg') }}"
        class="custom-img"
        alt="town"
      />
    </div>
    <div class="card-img">
      <div class="caption">
        <p>Kota Yogyakarta</p>
      </div>
      <img
        src="{{ asset('image/atas.jpg') }}"
        class="custom-img"
        alt="town"
      />
    </div>
    <div class="card-img">
      <div class="caption">
        <p>Kota Semarang</p>
      </div>
      <img
        src="{{ asset('image/WhatsApp Image 2024-06-05 at 15.39.24.jpeg') }}" class="custom-img"
        alt="town"
      />
    </div>
    <div class="card-img">
      <div class="caption">
        <p>Kota Surabaya</p>
      </div>
      <img
        src="{{ asset('image/flores.jpg') }}"
        class="custom-img"
        alt="town"
      />
    </div>
  </div>

@endsection