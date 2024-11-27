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

if (isset($_POST['tambahakun'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `tbluser` (username, password, email) VALUES ('$username', '$password', '$email')";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil disimpan";
    } else {
        echo "<script>alert('Data berhasil disimpan')</script>";
    }
}

if (isset($_POST["editakun"])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE tbluser set password = '$password' where id='$id'";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil diupdate";
    } else {
        echo "<script>alert('Data berhasil diupdate')</script>";
    }
}
header("Location: akun.php");

if (isset($_POST["editprofil"])) {
    $id = $_POST['id'];
    $namalengkap = $_POST['namalengkap'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $sql = "UPDATE tbluser set namalengkap='$namalengkap', nomor='$nomor', alamat='$alamat' where id='$id'";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil diupdate";
    } else {
        echo "<script>alert('Data berhasil diupdate')</script>";
    }
}
header("Location: akun.php");

?>