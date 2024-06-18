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
                Pencapaian Baru Tim Kami: Prestasi Luar Biasa di Tahun Ini
                <span class="text-muted" style="color:rgb(213, 147, 3);">Menuju Masa Depan Gemilang</span>
            </h2>
            <p class="lead" style="color: black">
                Tahun ini merupakan tahun yang penuh dengan prestasi bagi tim kami. Dengan kerja keras dan dedikasi, kami
                berhasil mencapai berbagai target yang telah ditetapkan. Mari kita lihat lebih dekat bagaimana perjalanan
                kami menuju sukses dan rencana besar untuk masa depan.
            </p>
            <p style="color: black">
                Dalam beberapa bulan terakhir, tim kami telah berhasil menyelesaikan beberapa proyek besar yang membawa
                dampak signifikan bagi perusahaan. Kerjasama yang solid, inovasi, dan ketekunan adalah kunci utama
                keberhasilan kami. Dengan semangat dan komitmen tinggi, kami terus berupaya memberikan hasil terbaik dalam
                setiap tugas yang diemban.
            </p>
            <p style="color: black">
                Salah satu proyek yang paling menonjol adalah pengembangan platform baru yang telah menerima pujian dari
                berbagai pihak. Platform ini tidak hanya meningkatkan efisiensi kerja tetapi juga memberikan pengalaman yang
                lebih baik bagi pengguna.
            </p>
            <p style="color: black">
                Tidak berhenti sampai di sini, kami memiliki beberapa rencana ambisius untuk tahun mendatang. Fokus utama
                kami adalah memperluas jangkauan pasar, meningkatkan kualitas layanan, dan terus berinovasi untuk tetap
                berada di garis depan industri. Dengan semangat pantang menyerah, kami yakin dapat meraih lebih banyak
                pencapaian di masa depan.
            </p>
            <div>
                <button class="btn btn-primary" id="like-button"><i class="fas fa-thumbs-up"></i> Like</button>
            </div>
            <div style="margin-top: 20px;">
                <a href="https://facebook.com" class="btn btn-social-icon btn-facebook"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" class="btn btn-social-icon btn-twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" class="btn btn-social-icon btn-instagram"><i
                        class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-md-5">
            <img src="https://cdn.pixabay.com/photo/2023/04/26/16/01/lighthouse-7952718_1280.jpg"
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="1000"
                height="500" alt="Tim Kami">
        </div>
    </div>
@endsection
