<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Konsultasi Gizi</title>
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="width:100%; max-height: 400px !important;">
                    <div class="carousel-item active">
                        <img src="asset/img/cs1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="asset/img/cs2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="asset/img/cs3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Login As</h1>
                    <p class="lead text-muted"></p>
                    <p>
                        <a href="pasien/login.php" class="btn" style="background-color: #8ECDB1;">Pasien</a>
                        or
                        <a href="ahli_gizi/login.php" class="btn" style="background-color: #8ECDB1;">Ahli Gizi</a>
                    </p>
                </div>
            </div>
        </section>
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Ratusan Anak di Lobar Mengalami Gizi Buruk</h1>
                <p class="lead my-3">Giri Menang (Suara NTB) – Kasus gizi buruk masih banyak ditemukan di Lombok Barat (Lobar). Jumlah balita yang mengalami gizi buruk mencapai 0,92 persen atau sekitar 516 anak dari total balita 56.050</p>
                <p class="lead mb-0"><a href="https://www.suarantb.com/ratusan-anak-di-lobar-mengalami-gizi-buruk/" class="text-white fw-bold">Continue reading...</a></p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">Hasil Konsultasi Pasien</h4>
                    <?php
                    require 'config/connect.php';
                    $i = 1;
                    $sql = "SELECT * FROM konsultasi WHERE publish_pasien = 'true' AND publish_gizi = 'true'";
                    $result = mysqli_query($conn, $sql);
                    while ($results = mysqli_fetch_object($result)) {
                    ?>
                        <p class="mb-0">
                            No : <?= $i; ?>
                            <br>
                            Nama : <?= $results->namaPasien; ?>
                            <br>
                            Konsultasi : <?= $results->konsultasi; ?>
                            <br>
                            Jawaban Konsultasi : <?= $results->jawab_konsul; ?>
                        </p>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>