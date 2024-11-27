<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
include "link.php";
include "navbarakun.php";
include "koneksi.php";
// mengambil data email dari tabel accounts
$stmt = $con->prepare('SELECT email FROM tbladmin WHERE id = ?');
// mengambil data email berdasarkan id
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();
?>

<h2 class="text-center">Akun Yang Sedang Digunakan</h2>
<div class="content">
  <p>Username : <?= $_SESSION['name'] ?>
    <br>
    Email : <?= $email ?>
  </p>
  <?php
  include "koneksi.php";
  $sql = "SELECT id, username, password, email FROM tbladmin";
  $query = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($query)) {
    ?>
    <!--<center>
      <a href="editakun.php?id=<?php echo $row["id"]; ?>" class="button">
        Edit Akun
      </a>
    </center>-->
    <?php
  }
  ?>
</div>


<style>
  * {
    box-sizing: border-box;
    font-family: "segoe ui", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
  }

  .register {
    flex: 1;
    color: #1ebc09;
    font-weight: normal;
  }

  .login {
    width: 400px;
    background-color: #ffffff;
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
    margin: 100px auto;
  }

  .login h1 {
    text-align: center;
    color: #5b6574;
    font-size: 24px;
    padding: 20px 0 20px 0;
    border-bottom: 1px solid #dee0e4;
  }

  .login form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 20px;
  }

  .login form input[type="password"],
  .login form input[type="text"] {
    width: 310px;
    height: 50px;
    border: 1px solid #dee0e4;
    margin-bottom: 20px;
    padding: 0 15px;
  }

  .login form input[type="submit"] {
    width: 100%;
    padding: 15px;
    margin-top: 20px;
    background-color: #3274d6;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff;
    transition: background-color 0.2s;
  }

  .login form input[type="submit"]:hover {
    background-color: #2868c7;
    transition: background-color 0.2s;
  }

  .navtop {
    background-color: #2f3947;
    height: 60px;
    width: 100%;
    border: 0;
  }

  .navtop div {
    display: flex;
    margin: 0 auto;
    width: 1000px;
    height: 100%;
  }

  .navtop div h1,
  .navtop div a {
    display: inline-flex;
    align-items: center;
  }

  .navtop div h1 {
    flex: 1;
    font-size: 24px;
    padding: 0;
    margin: 0;
    color: #eaebed;
    font-weight: normal;
  }

  .navtop div a {
    padding: 0 20px;
    text-decoration: none;
    color: #c1c4c8;
    font-weight: bold;
  }

  .navtop div a i {
    padding: 2px 8px 0 0;
  }

  .navtop div a:hover {
    color: #eaebed;
  }

  body.loggedin {
    background-color: #f3f4f7;
  }

  .content {
    max-width: 1000px;
    width: 100%;
    margin: 0 auto;
  }

  .content h2 {
    padding: 25px 0;
    font-size: 22px;
    border-bottom: 1px solid #e0e0e3;
    color: #4a536e;
  }

  .content>p,
  .content>div {
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
    margin: 25px 20px 40px 20px;
    padding: 25px;
    background-color: #fff;
  }

  .content>p table td,
  .content>div table td {
    padding: 5px;
  }

  .content>p table td:first-child,
  .content>div table td:first-child {
    font-weight: bold;
    color: #4a536e;
    padding-right: 15px;
  }

  .content>div p {
    padding: 5px;
    margin: 0 0 10px 0;
  }

  .tengah h1 {
    margin: 0;
    padding: 25px 0;
    font-size: 100px;
    border-bottom: 1px solid #e0e0e3;
    color: #4a536e;
  }

  .teks-kanan {
    text-align: right;
  }

  h2 {
    text-align: center;
    margin-bottom: 40px;
    margin-top: 60px;
    font-size: 30px
  }

  table {
    margin: auto;
    width: 60%;
    border-collapse: collapse;
    margin-bottom: 30px
  }

  td,
  th {
    border: 2px solid black;
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  button {
    background-color: rgb(76, 79, 76);
    color: white;
    margin: 5px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
  }

  .button {
    background-color: rgb(76, 79, 76);
    color: white;
    margin: 5px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    text-decoration: none;
  }


  .lastbutton {
    background-color: rgb(76, 79, 76);
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    font-size: 15px;
  }

  button:hover {
    background-color: rgb(42, 43, 42);
  }
</style>