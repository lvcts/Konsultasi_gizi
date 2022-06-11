<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "konsultasi_gizi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
