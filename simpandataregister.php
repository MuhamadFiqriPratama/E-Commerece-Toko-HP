<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dblogin';
// menghubungkan ke database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // jika terjadi kesalahan koneksi, hentikan skrip dan tampilkan kesalahan
    exit('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO `tbluser` (username, password, email, namalengkap, nomor, alamat) VALUES ('$username', '$password', '$email', '$namalengkap', '$nomor', '$alamat')";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil disimpan";
    } else {
        echo "<script>alert('Data berhasil disimpan')</script>";
    }
}
header("Location: beranda.php");
?>