<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Menu Ahli Gizi</title>
</head>

<body>
    <?php require_once '../template/header_gizi.php'; ?>>
    <?php require '../config/connect.php';
    session_start();

    if (!isset($_SESSION['nama'])) {
        header("Location: login.php");
    }
    ?>
    <div class="container-fluid text-center">
        <div class="jumbotron" style="margin-top: 2vw;">
            <img src="../asset/img/logo.png" width="150vw" class="img-thumbnail rounded-circle" alt="...">
            <?= "<h4>Welcome  " . $_SESSION['nama'] . "!" . "</h4>"; ?>
            <p class="lead">Untuk meningkatkan keadaan gizi, kesehatan, kecerdasan, dan kesejahteraan rakyat. Menjunjung tinggi nama baik profesi gizi, dengan menunjukkan sikap, perilaku dan budi luhur, serta tidak mementingkan kepentingan pribadiI. Senantiasa menjalankan profesinya menurut ukuran yang tertinggi.</p>
            <hr class="my-4">
            <p>Konsultasi dilakukan pada menu jawab konsultasi</p>
            <a class="btn btn-lg" style="background-color: #8ECDB1;" href="daftar_konsul.php" role="button">Jawab Konsultasi</a>
        </div>
    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>