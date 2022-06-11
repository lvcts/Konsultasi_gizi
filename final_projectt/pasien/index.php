<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Nutrient</title>
</head>

<body>
    <?php require_once '../template/header.php'; ?>
    <?php require '../config/connect.php';
    session_start();

    if (!isset($_SESSION['id_pasien'])) {
        header("Location: login.php");
    }
    if (isset($_POST['submit'])) {
        $namaPasien = $_POST['namaPasien'];
        $umurPasien = $_POST['umurPasien'];
        $riwayat = $_POST['riwayat'];
        $konsultasi = $_POST['konsultasi'];
        $sess = $_SESSION['id_pasien'];

        $sql = "INSERT INTO konsultasi (namaPasien,umurPasien,riwayat,konsultasi,id_pasien,publish_pasien,publish_gizi)
               VALUES ('$namaPasien','$umurPasien','$riwayat','$konsultasi','$sess','false','false')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Konsultasi Berhasil')</script>";
        }
    }
    ?>
    <div class="container-fluid">
        <div class="container" style="margin-top: 2vw;">
            <h3 class="text-center">Konsultasi Gizi</h3>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="namaPasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" id="namaPasien" placeholder="Nama" name="namaPasien" value="" require>
                </div>
                <div class="mb-3">
                    <label for="umurPasien" class="form-label">Umur Pasien</label>
                    <input type="text" class="form-control" id="umurPasien" placeholder="Umur" name="umurPasien" value="">
                </div>
                <div class="mb-3">
                    <label for="riwayat" class="form-label">Riwayat</label>
                    <textarea class="form-control" id="riwayat" rows="3" name="riwayat" value=""></textarea>
                </div>
                <div class="mb-3">
                    <label for="konsultasi" class="form-label">Konsultasi</label>
                    <textarea class="form-control" id="konsultasi" rows="3" name="konsultasi" value=""></textarea>
                </div>
                <div class="d-grid gap-2 mx-auto">
                    <button type="submit" class="btn" style="background-color: #8ECDB1;" name="submit">Konsultasi</button>
                </div>
            </form>
        </div>
        <div class="container" style="margin-top: 2vw;">
            <p>Hasil konsultasi akan di tampilkan pada halaman cek hasil konsulltasi</p>
            <a class="btn btn-danger d-grid gap-2 mx-auto" href="konsul.php">Cek Hasil Konsultasi</a>
        </div>
    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>