<?php
include "koneksi.php";
//tangkap kiriman dari laporan berupa nomor id yg akan diedit
if(isset($_GET['id'])) {
$id=$_GET['id'];
$sql = "DELETE FROM tbladmin where id='$id'";
$result = mysqli_query($con, $sql);
 if (!$result) {
 echo '<script language="javascript">';
 echo 'alert("Data Tidak Berhasil Dihapus!")';
 echo '</script>';
 echo '<script language="javascript">';
 echo 'window.location.href ="akun.php"';
 echo '</script>';
 } else {
 echo '<script language="javascript">';
 echo 'alert("Data Berhasil Dihapus!")';
 echo '</script>';
 echo '<script language="javascript">';
 echo 'window.location.href ="akun.php"';
 echo '</script>';
 }
} 
else if(isset($_GET['idproduk'])) {
    $id=$_GET['idproduk'];
    $qproduk = mysqli_query($con,"SELECT * from tblproduk where id='$id'");
    $row = mysqli_fetch_array($qproduk);
    if(file_exists("../assets/$row[gambar]")) {
        unlink("../assets/$row[gambar]");
    }
    $sql = "DELETE FROM tblproduk where id='$id'";
    $result = mysqli_query($con, $sql);
     if (!$result) {
     echo '<script language="javascript">';
     echo 'alert("Data Tidak Berhasil Dihapus!")';
     echo '</script>';
     echo '<script language="javascript">';
     echo 'window.location.href ="produk.php"';
     echo '</script>';
     } else {
     echo '<script language="javascript">';
     echo 'alert("Data Berhasil Dihapus!")';
     echo '</script>';
     echo '<script language="javascript">';
     echo 'window.location.href ="produk.php"';
     echo '</script>';
     }
    } else {
    die('Data Tidak ditemukan!');
    }
//Menentukan nama Fieldnya dari tabel yg akan dihapus datanya
?>