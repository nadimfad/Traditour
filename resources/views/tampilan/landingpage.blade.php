@extends('tampilan.index')
    <style>
    /* Definisi animasi */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mengatur animasi pada elemen dengan class .card */
.card {
    opacity: 0; /* Set awal opacity menjadi 0 */
    animation: fadeInUp 4s forwards; /* Menggunakan animasi fadeInUp selama 1 detik */
}

/* Tambahan animasi delay untuk tiap .card berdasarkan urutan */
.card:nth-child(1) {
    animation-delay: 0.2s;
}

.card:nth-child(2) {
    animation-delay: 0.4s;
}

.card:nth-child(3) {
    animation-delay: 0.6s;
}
</style>
@section('konten')
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/foto4.jpeg') }}" class="d-block w-100" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Temukan Keindahan Sulawesi Utara!</h1>
                        <p>Selami pesona alam dan keanekaragaman budaya Sulawesi Utara. Dari pantai-pantai eksotis hingga
                            pegunungan yang memukau, setiap sudutnya menanti untuk kamu jelajahi.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}">Daftar Sekarang</a></p>
                    </div>

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/sulawesi.jpg') }}" class="d-block w-100" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Jelajahi Keajaiban Bahari Sulawesi Utara!</h1>
                        <p>
                            Temukan dunia bawah laut yang memukau dengan terumbu karang yang indah dan kehidupan laut yang
                            menakjubkan.
                            Mari berpetualang di surga bahari yang belum terjamah.
                        </p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="{{ route('bahari') }}">Pelajari Lebih Lanjut</a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/gambar.jpg') }}" class="d-block w-100" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Abadikan Momen di Sulawesi Utara</h1>
                        <p>
                            Lihat koleksi foto yang menakjubkan dari perjalanan kami di Sulawesi Utara. Setiap gambar
                            menceritakan
                            keindahan dan pesona yang menanti untuk dijelajahi.
                        </p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="{{ route('galeri') }}">Lihat Galeri</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- end halaman besar --}}
    {{-- card uji coba --}}
    {{-- <div class="container container-background">
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                        <h5 class="card-title mt-2">Destinasi</h5>
                        <p class="card-text">
                            Temukan keajaiban tersembunyi dengan TradiTour! Jelajahi destinasi menakjubkan yang kaya akan
                            sejarah, budaya,
                            dan keindahan alam. Setiap perjalanan membawa Anda lebih dekat ke pesona lokal dan pengalaman
                            tak terlupakan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <h5 class="card-title mt-2">Pemasaran</h5>
                        <p class="card-text">
                            Kami TradiTour berkomitmen untuk mendukung pertumbuhan ekonomi di Sulawesi Utara dengan
                            strategi pemasaran
                            yang efektif.
                            Kami membantu Anda untuk menjangkau lebih banyak pelanggan, meningkatkan penjualan, dan
                            memperkuat kehadiran merek
                            Anda di pasar lokal maupun regional.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <h5 class="card-title mt-2">Ekonomi Kreatif</h5>
                        <p class="card-text">
                            Memanfaatkan kreativitas untuk mendorong pertumbuhan ekonomi dan inovasi. Dari produk unik
                            hingga layanan
                            berbasis budaya, mari bersama mengembangkan potensi ekonomi lokal dengan ide-ide yang segar dan
                            berani.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
    <div class="container container-background">
        <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                        </svg>
                        <h5 class="card-title mt-2">Destinasi</h5>
                        <p class="card-text">
                            Temukan keajaiban tersembunyi dengan TradiTour! Jelajahi destinasi menakjubkan yang kaya akan
                            sejarah, budaya, dan keindahan alam. Setiap perjalanan membawa Anda lebih dekat ke pesona lokal
                            dan pengalaman tak terlupakan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <h5 class="card-title mt-2">Pemasaran</h5>
                        <p class="card-text">
                            Kami TradiTour berkomitmen untuk mendukung pertumbuhan ekonomi di Sulawesi Utara dengan strategi
                            pemasaran yang efektif. Kami membantu Anda untuk menjangkau lebih banyak pelanggan, meningkatkan
                            penjualan, dan memperkuat kehadiran merek Anda di pasar lokal maupun regional.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange"
                            class="bi bi-shop-window" viewBox="0 0 16 16">
                            <path
                                d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <h5 class="card-title mt-2">Ekonomi Kreatif</h5>
                        <p class="card-text">
                            Memanfaatkan kreativitas untuk mendorong pertumbuhan ekonomi dan inovasi. Dari produk unik
                            hingga layanan berbasis budaya, mari bersama mengembangkan potensi ekonomi lokal dengan ide-ide
                            yang segar dan berani.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid hero-section position-relative p-0">
        <div class="overlay"></div>
        <div class="row w-100 m-0 hero-content">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-start p-5"
                style="text-align: justify;">
                <h2 class="display-4 fw-bold hero-text mb-3">Keindahan Sulawesi Utara</h2>
                <p class="lead hero-text mb-4">Taman Nasional Bunaken merupakan salah satu ciri khas alam Sulawesi Utara
                    yang mempesona. Dengan terumbu karang yang indah dan keanekaragaman hayati laut yang luar biasa, Bunaken
                    menjadi destinasi wisata snorkeling dan diving yang sangat populer. Anda dapat menjelajahi keindahan
                    bawah laut Bunaken dengan menyelam atau snorkeling, dan menyaksikan kehidupan laut yang memukau, seperti
                    ikan karang yang berwarna-warni, penyu, hiu, dan terumbu karang yang menakjubkan</p>
            </div>
            <div class="col-lg-6 hero-img-container p-0">
                <img src="https://tribratanews.polri.go.id/web/image/blog.post/61435/image" alt="Hero Image"
                    class="img-fluid">
            </div>
        </div>
    </div>
    {{-- end main content --}}
    <div class="container px-4 py-5 overflow-x-scroll" id="custom-cards">
        <div class="d-flex justify-content-center">
            <h1 class="pb-2 border-bottom text-dark">Destination Highlight</h1>
        </div>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5 ">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Bendungan_Lolak.jpg/1920px-Bendungan_Lolak.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h4 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Bolaang Mongondow</h4>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://cdn.idntimes.com/content-images/post/20181027/wacanaco-rumah-lamin-623eb95f50eacc00366d3d131d285fc7-10a73338a3f3ac12addb472374765868.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Bolaang Mongondow Selatan</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Pantai_Panagu_Bolmut.jpg/375px-Pantai_Panagu_Bolmut.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Bolaang Mongondow Timur</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/d/df/Tahuna%2C_Sangihe_Islands.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"> Kabupaten Bolaang Mongondow Utara</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Danau_cinta_Makalehi.jpg/1280px-Danau_cinta_Makalehi.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Kepulauan Sangihe</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/7/7c/Monumen_Tuhan_Yesus_Raja_Memberkati%2C_Talaud.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Kepulauan Siau Tagulandang Biaro</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Danau_Tondano%2C_Sulawesi_Utara%2C_Indonesia.jpg/432px-Danau_Tondano%2C_Sulawesi_Utara%2C_Indonesia.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Kepulauan Talaud</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://3.bp.blogspot.com/-1y_Sm7Kaf3I/Wa0IVvBTw4I/AAAAAAAAA-w/Ctxwywi_higsubb0NRfIRfHDpiEW-8N4gCLcBGAs/s1600/bu4.JPG');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Minahasa</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://www.celebes.co/wp-content/uploads/2020/04/Taman-Nasional-Bunaken-Bagian-Selatan-Minahasa-Selatan.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Minahasa Selatan</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://images.bisnis.com/posts/2020/08/14/1279291/20150429gunung_soputan.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Minahasa Tenggara</h2>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://seringjalan.com/wp-content/uploads/2020/03/minahasa-utara.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kabupaten Minahasa Utara
                        </h2>
                    </div>
                </div>
            </div>
            {{-- costume card --}}
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://totabuan.news/wp-content/uploads/2019/12/wisata-bitung.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kota Bitung</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/PemandanganKotamobaguBarat.jpg/1200px-PemandanganKotamobaguBarat.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"> Kota Kotamobagu</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Manado_Skyline.jpg/1920px-Manado_Skyline.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"> Kota Manado</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Lokon.JPG/1280px-Lokon.JPG');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Kota Tomohon</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- costume card end --}}
    <div style="text-align: center; padding-bottom:100px">
        {{-- lokasi --}}
        <h3 class="text-dark"style="padding-bottom: 50px">Lokasi</h3>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4080236.9802051685!2d125.14621444999999!3d2.9289109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287754270069e31%3A0x45891617980cb835!2sSulawesi%20Utara!5e0!3m2!1sid!2sid!4v1717490584090!5m2!1sid!2sid"
            width="1500" height="500" style="border:0; display: inline-block;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- end lokasi --}}
    </div>
@endsection
