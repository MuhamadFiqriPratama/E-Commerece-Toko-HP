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

if (isset($_POST['checkout'])) {
    $idproduk = $_POST['idproduk'];
    $iduser = $_POST['iduser'];
    $jumlah = $_POST['jumlah'];
    $subtotal = $_POST['totalx'];
    $sql = "INSERT INTO tblorder (idproduk, iduser, jumlah, subtotal) VALUES ('$idproduk', '$iduser', '$jumlah', '$subtotal')";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil disimpan";
    } else {
        echo "<script>alert('Data berhasil disimpan')</script>";
    }
}
header("Location: produk.php");
?>