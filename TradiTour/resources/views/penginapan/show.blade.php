@extends('tampilan.index')
<style>
    /* Gaya untuk Nama Penginapan */
    h2.text-primary {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        /* Ubah warna teks jika diperlukan */
    }

    /* Gaya untuk Alamat Penginapan */
    p.lead {
        font-size: 1.1rem;
        color: #555;
    }

    /* Gaya untuk Gambar Penginapan */
    .img-fluid {
        width: 100%;
        max-height: 500px;
        /* Sesuaikan tinggi maksimum sesuai kebutuhan */
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        /* Efek transisi untuk zoom */
    }

    .img-fluid:hover {
        transform: scale(1.1);
        /* Efek zoom pada hover */
    }

    /* Gaya untuk Deskripsi Penginapan */
    p {
        font-size: 1.15rem;
        line-height: 1.8;
    }

    /* Gaya untuk ikon media sosial */
    .social-icons .btn {
        font-size: 1.5rem;
        width: 50px;
        height: 50px;
        margin-right: 10px;
        border-radius: 50%;
        color: #fff;
        background-color: #007bff;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .social-icons .btn img {
        max-width: 100%;
        height: auto;
    }

    .overview-divider {
        border-top: 2px solid black;
        margin: 20px 0;
        /* Untuk memberikan ruang di sekitar garis */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-primary">{{ $penginapan->nama_penginapan }}</h2>
                <p class="lead mb-4">{{ $penginapan->alamat_penginapan }}</p>
                <div class="img-zoom-container mb-4">
                    <img src="{{ asset('images/' . $penginapan->gambar_penginapan) }}"
                        alt="{{ $penginapan->nama_penginapan }}" class="img-fluid rounded">
                </div>
                <hr class="overview-divider">
                <p style="font-size: 1.5rem; color: black; font-weight: bold;">overview</p>
                <p style="color: black">{{ $penginapan->deskripsi_penginapan }}</p>
                <p style="color: black"><strong>Harga: RP/malam {{ $penginapan->harga_penginapan }} </strong></p>
                <!-- Social Media Icons -->
                <div class="social-icons mt-4">
                    <a href="https://facebook.com" class="btn btn-social-icon btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" class="btn btn-social-icon btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" class="btn btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
