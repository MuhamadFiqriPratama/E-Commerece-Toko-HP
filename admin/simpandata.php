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
    $password = $_POST['passsword'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `tbladmin` (username, password, email) VALUES ('$username', '$password', '$email')";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil disimpan";
    } else {
        echo "<script>alert('Data berhasil disimpan')</script>";
    }
    header("Location: akun.php");
}

if (isset($_POST["editakun"])) {
    $id = $_POST['id'];
    $password = $_POST['passsword'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE tbladmin set password ='$password' where id='$id'";

    $query = mysqli_query($con, $sql);

    if (!$query) {
        echo "Data tidak berhasil diupdate";
    } else {
        echo "<script>alert('Data berhasil diupdate')</script>";
    }
    header("Location: akun.php");
}

if (isset($_POST["tambahproduk"])) {
    $namaproduk = $_POST["namaproduk"];
    $harga = $_POST['harga'];
    $file = $_FILES["gambar"]["name"];
    $newname = rand(1000, 99999) . "_" . $file;
    $deskripsi = $_POST["deskripsi"];
    if (!empty($file)) {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../assets/" . $newname);
        $addproduk = mysqli_query($con, "INSERT into tblproduk values ('', '$newname','$namaproduk','$harga','$deskripsi')");
        if (!$addproduk) {
            echo "<script>alert('Data gagal ditambah')</script>";
            header("Location: produk.php");
        } else {
            echo "<script>alert('Data berhasil ditambah')</script>";
            header("Location: produk.php");
        }
    }
}
if (isset($_POST["editproduk"])) {
    $idproduk = $_POST["idproduk"];
    $namaproduk = $_POST["namaproduk"];
    $harga = $_POST['harga'];
    $file = $_FILES["gambar"]["name"];
    $newname = rand(1000, 99999) . "_" . $file;
    $deskripsi = $_POST["deskripsi"];
    $qproduk = mysqli_query($con, "SELECT * from tblproduk where id='$idproduk'");
    $row = mysqli_fetch_array($qproduk);
    // var_dump($idproduk)

    if (!empty($file)) {
        if (file_exists("../assets/$row[gambar]")) {
            unlink("../assets/$row[gambar]");
        }
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../assets/" . $newname);
        $addproduk = mysqli_query($con, "UPDATE tblproduk set gambar = '$newname', namaproduk = '$namaproduk', harga = '$harga', deskripsi = '$deskripsi' where id='$idproduk'");
        if (!$addproduk) {
            echo "<script>alert('Data gagal ditambah')</script>";
            header("Location: produk.php");
        } else {
            echo "<script>alert('Data berhasil ditambah')</script>";
            header("Location: produk.php");
        }
    } else {
        $addproduk = mysqli_query($con, "UPDATE tblproduk set namaproduk = '$namaproduk', harga = '$harga', deskripsi = '$deskripsi' where id='$idproduk'");
        if (!$addproduk) {
            echo "<script>alert('Data gagal ditambah')</script>";
            header("Location: produk.php");
        } else {
            echo "<script>alert('Data berhasil ditambah')</script>";
            header("Location: produk.php");
        }
    }
}

?>