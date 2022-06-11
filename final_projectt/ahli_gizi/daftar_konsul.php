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
    <?php require_once '../template/header.php'; ?>
    <?php require '../config/connect.php';
    error_reporting(0);
    session_start();
    if (!isset($_SESSION['email'])) {
        header('location:index.php');
    }
    ?>
    <div class="container-fluid">
        <h1>Konsul</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Province</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Umur Pasien</th>
                        <th scope="col">Riwayat</th>
                        <th scope="col">Konsultasi</th>
                        <th scope="col">Jawaban Konsul</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM konsultasi
                    JOIN pasien ON pasien.id_pasien = konsultasi.id_pasien";
                    $result = mysqli_query($conn, $sql);
                    while ($results = mysqli_fetch_object($result)) {
                    ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $results->firstName; ?></td>
                            <td><?= $results->lastName; ?></td>
                            <td><?= $results->address; ?></td>
                            <td><?= $results->city; ?></td>
                            <td><?= $results->province; ?></td>
                            <td><?= $results->namaPasien; ?></td>
                            <td><?= $results->umurPasien; ?></td>
                            <td><?= $results->riwayat; ?></td>
                            <td><?= $results->konsultasi; ?></td>
                            <td><?= $results->jawab_konsul; ?></td>
                            <td>
                                <a class="btn" style="background-color: #8ECDB1;" href="jawab_konsul.php?id_pasien=<?= $results->id_pasien ?>">Jawab</a>
                                <br><br>
                                <a class="btn" style="background-color: #8ECDB1;" href="?publish&id_pasien=<?= $results->id_pasien ?>" id="publish" onclick="return validate()">Share</a>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                    <?php
                    if (isset($_GET['publish'])) {
                        $sql = "UPDATE konsultasi SET publish_gizi = 'true' WHERE id_pasien = " . $_GET['id_pasien'];
                        $result = mysqli_query($conn, $sql);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="../asset/js/script.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>