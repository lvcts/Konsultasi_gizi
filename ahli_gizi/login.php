<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Ahli Gizi</title>
</head>

<body>
    <?php require_once '../template/header_gizi.php'; ?>
    <?php require '../config/connect.php';
    error_reporting(0);

    session_start();

    if (isset($_SESSION['email'])) {
        header("Location: index.php");
    }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM ahli_gizi WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['nama'] = $row['nama'];
            header("Location: index.php");
        } else {
            echo "<script>alert('Email Or Password Incorrect.Try Again!')</script>";
        }
    }
    ?>
    <div class="container-fluid">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="container border rounded" style="margin-top: 10vw; padding: 5vw;">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $email; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= $_POST['password']; ?>" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="d-grid gap-2 mx-auto">
                        <button type="submit" class="btn" style="background-color: #8ECDB1;" name="submit">Log In</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>