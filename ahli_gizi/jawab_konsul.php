<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Jawab Konsul</title>
</head>

<body>
    <?php require_once '../template/header_gizi.php'; ?>
    <?php require '../config/connect.php';
    error_reporting(0);
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:index.php');
    }
    ?>
    <div class="container-fluid">
        <div class="container border " style="margin-top: 2vw;">
            <?php
            $id_pasien = $_GET['id_pasien'];
            $sql = "SELECT * FROM konsultasi
                    JOIN pasien ON pasien.id_pasien = konsultasi.id_pasien
                    WHERE pasien.id_pasien = " . $id_pasien;
            $result = mysqli_query($conn, $sql);
            $results = mysqli_fetch_object($result);
            ?>
            <pre>
                Email Akun : <?= $results->email; ?>
                <br>
                Nama Pasien: <?= $results->namaPasien; ?>
                <br>
                Umur Pasien: <?= $results->umurPasien; ?>
                <br>
                Riwayat: <?= $results->riwayat; ?>
                <br>
                Konsultasi: <?= $results->konsultasi; ?>
            </pre>
        </div>
        <div class="container" style="margin-top: 2vw;">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="jawab_konsul" class="form-label">Jawaban Konsultasi</label>
                    <textarea class="form-control" id="jawab_konsul" rows="3" name="jawab_konsul"></textarea>
                </div>
                <div class="d-grid gap-2 mx-auto">
                    <button type="submit" class="btn btn-success" name="submit">Kirim Jawaban</button>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $jawab_konsul = $_POST['jawab_konsul'];
                    $sql = "UPDATE konsultasi SET jawab_konsul ='" . $jawab_konsul . "' WHERE id_pasien =" . $id_pasien;
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script> alert('Berhasil')</script>";
                        header("Location: daftar_konsul.php");
                    } else {
                        echo "<script> alert('Gagal')</script>";
                    }
                }
                ?>
            </form>
        </div>

    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>