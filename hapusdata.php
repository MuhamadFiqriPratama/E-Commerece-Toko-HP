<?php
include "koneksi.php";
//tangkap kiriman dari laporan berupa nomor id yg akan diedit
if(isset($_GET['id'])) {
$id=$_GET['id'];
} else {
die('Data Tidak ditemukan!');
}
//Menentukan nama Fieldnya dari tabel yg akan dihapus datanya
$sql = "DELETE FROM tbluser where id='$id'";
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
?>