<?php
include ('koneksi.php');
include ('link.php');
include ('navbarorder.php');
$listpembeli = mysqli_query($con, "SELECT * from tblorder");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="container-xl konten">
        <div class="table-responsive shadow">
            <div class="table-wrapper">
                <div class="table-title tblTitle">
                    <div class="row">
                        <div>
                            <h2><b class="fs-4 text-center">Pesanan Anda</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">No Telp</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Gambar Produk</th>
                            <th class="text-center">Harga Produk</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($listpembeli)) {
                            ?>
                            <tr>
                                <td></td>
                                <td><?= $row["namalengkap"] ?></td>
                                <td><?= $row["alamat"] ?></td>
                                <td><?= $row["nomor"] ?></td>
                                <td>
                                    <div class="text-center"><?= $row["namaproduk"] ?></div>
                                </td>
                                <td><img class="gambar" src="../assets/<?= $row["gambar"] ?>"
                                        style="width: 40px; height: 40px;"></td>
                                <td>
                                    <div class="text-center"><?= $row["harga"] ?></div>
                                </td>
                                <td>
                                    <div class="text-center"><?= $row["jumlah"] ?></div>
                                </td>
                                <td>
                                    <div class="text-center"><?= $row["subtotal"] ?></div>
                                </td>
                                <td class="d-flex">
                                    <a onclick="return confirm(`Yakin Hapus <?= $row['namaproduk'] ?>`)"
                                        href="hapusdata.php?idproduk=<?= $row["id"] ?>"
                                        class="btn btn-danger m-2 text-light">Hapus</a>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
    }

    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn:hover,
    .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.settings {
        color: #2196F3;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }

    .text-success {
        color: #10c469;
    }

    .text-info {
        color: #62c9e8;
    }

    .text-warning {
        color: #FFC107;
    }

    .text-danger {
        color: #ff5b5b;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    .heading {
        color: rgb(250, 255, 99);
    }

    .konten {
        font-family: 'Varela Round', sans-serif;
    }

    .gambar {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .tblTitle {
        background: radial-gradient(circle at 14.64% -11.24%, #ff7abf 0, #ff72c4 10%, #f46ac9 20%, #e562ce 30%, #d35bd3 40%, #be55d8 50%, #a551dd 60%, #884fe1 70%, #624fe6 80%, #1a51ea 90%, #0052ee 100%);
    }
</style>



<style>
    h2 {
        text-align: center;
        margin-bottom: 40px;
        margin-top: 60px;
        font-size: 30px
    }

    table {
        max-width: 1000px;
        width: 100%;
        margin: 0 auto;
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