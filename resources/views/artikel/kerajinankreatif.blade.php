@extends('tampilan.index')

@section('konten')
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.pixabay.com/photo/2024/01/08/15/54/defile-8495836_1280.jpg" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fst-italic">Artikel</h1>
                    <p class="lead my-3">Wisata Bahari Sulawesi Utara</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row featurette " style="text-align: justify; margin:0px 50px 50px 50px"
        style="margin-top: 80px; color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); padding: 20px;">
        <div class="col-md-7">
            <h2 class="featurette-heading" style="color: rgb(213, 147, 3);">
                {{ $kerajinan->judul }}
            </h2>
            <p class="lead" style="color: black">
                {{ $kerajinan->artikel }}
            </p>
            <div style="margin-top: 20px;">
                <a href="https://facebook.com" class="btn btn-social-icon btn-facebook"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" class="btn btn-social-icon btn-instagram"><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/'.$kerajinan->gambar) }}" alt="{{ $kerajinan->judul }}"
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="1000"
                height="500" alt="Tim Kami">
        </div>
    </div>
@endsection
