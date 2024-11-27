<?php
session_start();
include "koneksi.php";
$password = "";
if (!isset($_POST['username'], $_POST['password'])) {
}

if ($stmt = $con->prepare('SELECT id, password FROM tbluser WHERE username=?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
}

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();
}

if (password_verify($_POST['password'], $password)) {
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['name'] = $_POST['username'];
    $_SESSION['id'] = $id;
    header('Location: beranda.php');
} else {
    echo "<script>alert('Incorrect username and/or password!'); window.location='login.html'</script>";
    #header('Location: login.html');
}


$stmt->close();
?>