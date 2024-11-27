<?php
include ('koneksi.php');
include ('link.php');
include ('navbar.php');
$qproduk = mysqli_query($con, "SELECT * from tblproduk order by namaproduk asc");
?>

<!--catalogue-->
<div class="produk">
    <main class="mt-2 mb-5">
        <div class="container">
            <div class="tambah text-center mt-3">
                <a href="tambahproduk.php" class="btn btn-dark">Tambah Produk</a>
            </div>
            <div class="row">
                <?php
                while ($row = mysqli_fetch_array($qproduk)) {
                    ?>
                    <div class="col-md-4 mb-3 mt-5">
                        <div class="card">
                            <img class="rounded-top-2 p-5" src="../assets/<?= $row["gambar"] ?>" class="img-fluid"
                                alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $row["namaproduk"] ?></h5>
                                <h6 class="mb-4"><?= $row["harga"] ?></h6>
                                <h6>Deskripsi :</h6>
                                <h6><?= $row["deskripsi"] ?></h6>
                                <a href="editproduk.php?idproduk=<?= $row["id"] ?>"
                                    class="btn btn-warning w-50 m-2 ">Edit</a>
                                <a onclick="return confirm(`Yakin Hapus <?= $row['namaproduk'] ?>`)"
                                    href="hapusdata.php?idproduk=<?= $row["id"] ?>"
                                    class="btn btn-danger w-50 m-2 ">Hapus</a>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </main>
</div>