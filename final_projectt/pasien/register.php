<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
</head>

<body>
    <?php require_once '../template/header.php'; ?>
    <?php require '../config/connect.php';
    error_reporting(0);
    session_start();

    if (isset($_SESSION['email'])) {
        header("Location: login.php");
    }
    if (isset($_POST['submit'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];

        if ($password == $cpassword) {
            $sql = "SELECT * FROM pasien WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO pasien (firstName,lastName,email,password,address,city,province)
               VALUES('$firstName','$lastName','$email','$password','$address','$city','$province')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Registration Succesful')</script>";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Fatal Login')</script>";
                }
            } else {
                echo "<script>alert('Email Has Been Registered')</script>";
            }
        } else {
            echo "<script>alert('Password Not Match')</script>";
        }
    }
    ?>
    <div class="container-fluid">
        <h1 class="text-center m-3">Form Register</h1>
        <div class="container" style="margin-top:4vw; padding-left: 10vw; padding-right: 10vw;">
            <form action="" method="post" class="row g-3" name="formRegist" onsubmit="return validateForm()">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Siti Zahra" value="<?= $firstName ?>">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Salma" value="<?= $lastName ?>">
                </div>
                <div class=" col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="abcd@email.com" value="<?= $email ?>">
                </div>
                <div class=" col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $_POST['password']; ?>">
                </div>
                <div class=" col-md-6">
                    <label for="cpassword" class="form-label">Confirm Password </label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" value="<?= $_POST['cpassword']; ?>">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Jl. Poros " value="<?= $address ?>">
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $city ?>">
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" name="province" value="<?= $province ?>">
                </div>
                <div class="d-grid gap-2 mx-auto">
                    <button type="submit" class="btn" style="background-color: #8ECDB1;" name="submit">Daftar</button>
                    <a class="btn btn-danger" href="login.php">Log In</a>
                </div>
            </form>
        </div>
    </div>
    <?php require_once '../template/footer.php'; ?>
    <script src="../asset/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>