<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Konsultasi</title>
</head>

<body>
    <?php require_once '../template/header_pasien.php'; ?>
    <?php require '../config/connect.php';
    error_reporting(0);
    session_start();
    if (!isset($_SESSION['id_pasien'])) {
        header("Location: index.php");
    }
    $sess = $_SESSION['id_pasien'];
    $sql = "SELECT * FROM konsultasi WHERE id_pasien = '$sess'";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="container-fluid">
        <?php
        $i = 1;
        while ($results = mysqli_fetch_object($result)) {
        ?>
            <div class="border" style="margin: 2vw; padding: 2vw;">
                <div class="row">
                    <div class="col-3">
                        No
                        <br>
                        Nama Pasien
                        <br>
                        Umur Pasien
                        <br>
                        Riwayat
                        <br>
                        Konsultasi
                    </div>
                    <div class="col-1">
                        :
                        <br>
                        :
                        <br>
                        :
                        <br>
                        :
                        <br>
                        :
                    </div>
                    <div class="col-8">
                        <?= $i; ?>
                        <br>
                        <?= $results->namaPasien; ?>
                        <br>
                        <?= $results->umurPasien; ?>
                        <br>
                        <?= $results->riwayat; ?>
                        <br>
                        <?= $results->konsultasi; ?>

                    </div>
                </div>
            </div>
            <div class="border" style="margin: 2vw; padding: 2vw;">
                <div class="row">
                    <div class="col-3">
                        Jawaban Hasil Konsultasi
                    </div>
                    <div class="col-1">
                        :
                    </div>
                    <div class="col-8">
                        <?= $results->jawab_konsul; ?>
                    </div>
                </div>
            </div>
            <div class="button" style="margin-top: 2vw; margin-left: 2vw; margin-right: 2vw;">
                <div class="d-grid gap-2 mx-auto">
                    <a class="btn" style="background-color: #8ECDB1;" href="?publish&id_pasien=<?= $_SESSION['id_pasien'] ?>" id="publish1" onclick="return validate1()">Share</a>
                </div>
            </div>
            <div class="button" style="margin-left: 2vw; margin-right: 2vw; margin-top: 1vw;">
                <div class="d-grid gap-2 mx-auto">
                    <a name="dlt" class="btn btn-danger" href="?delete&id_konsultasi=<?= $results->id_konsultasi ?>" onclick="return deletevalidate()">Delete</a>
                </div>
            </div>
        <?php
            $i++;
        }
        if (isset($_GET['publish'])) {
            $sql = "UPDATE konsultasi SET publish_pasien = 'true' WHERE id_pasien = " . $_GET['id_pasien'];
            $result = mysqli_query($conn, $sql);
        }
        if (isset($_GET['delete'])) {
            $sql = "DELETE FROM konsultasi WHERE id_konsultasi = " . $_GET['id_konsultasi'];
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }

        ?>
    </div>
    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="../asset/js/script.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>