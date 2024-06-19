@extends('tampilan.index')

@section('konten')
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/foto1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="display-4 fst-italic">Selamat Datang</h1>
                    <p class="lead my-3">Wisata Bahari Sulawesi Utara</p>
                </div>
            </div>
        </div>
    </div>

    <main class="album py-5 bg-light">
        <div class="container">
            <div style="margin-bottom: 50px;">
                <h1 style="color: rgb(3, 3, 5);">Jelajahi Wisata Alam Sulawesi Utara</h1>
            </div>

            <!-- Search Form -->
            <form action="{{ route('bahari') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..."
                        value="{{ request()->query('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <section class="row row-cols-1 row-cols-md-4 g-3">
                @foreach ($baharis as $bahari)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('images/' . $bahari->gambar) }}" class="card-img-top fixed-size-img"
                                alt="{{ $bahari->judul }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bahari->judul }}</h5>
                                <p class="card-text">{{ Str::limit($bahari->artikel, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('showbahari', $bahari->id_bahari) }}"
                                            class="btn btn-sm btn-outline-secondary">Detail</a>
                                    </div>
                                    <small class="text-muted">{{ $bahari->created_at->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>

            <!--pagination-->
            <div class="d-flex justify-content-center mt-4">
                {{ $baharis->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
            </div>
    </main>
@endsection
