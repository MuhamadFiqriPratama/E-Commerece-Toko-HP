<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}
include ('koneksi.php');
include ('link.php');
if (!isset($_POST["totalproduk"])) {
    echo "Id Tidak Ditemukan";
    exit;
} else {
    $idx = $_POST["id"];
    $ids = $_SESSION['id'];
    $jumlah = $_POST["jumlah"];
    $qproduk = mysqli_query($con, "SELECT * from tblproduk where id='$idx' order by namaproduk asc");
}
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap"
    rel="stylesheet">


<div class="container">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil shadow-lg">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <?php
                while ($row = mysqli_fetch_array($qproduk)) {
                    $hargax = $row["harga"];
                    ?>
                    <div class="product-image">
                        <div class="border rounded-4 m-4 d-flex justify-content-center">
                            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                                href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
                                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                    src="assets/<?= $row["gambar"] ?>" />
                            </a>
                        </div>
                    </div>
                    <h2 class="fs-5 fw-bold text-center">Deskripsi :</h2>
                    <p class="fs-6 text-center">
                        <?= $row["deskripsi"] ?>
                    </p>
                </div>
                <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                    <h2 class="name mt-4 mb-2 font-2">
                        <?= $row["namaproduk"] ?>
                        <h2 class="fs-5">Product by <b class="text-warning heavenly">Heavenly Store</b></h2>
                        <div class="mb-3">
                            <span class="fs-4 font-1"><?php echo "Rp. " . number_format($row["harga"]) . ",-"; ?></span>
                        </div>
                    </h2>
                    <hr />
                    <div class="font-3">
                        <h2 class="fs-5">Nama :
                            <?php
                            $ids = $_SESSION['id'];
                            $datapembeli = mysqli_query($con, "SELECT * from tbluser where id='$ids' order by id asc");
                            while ($row2 = mysqli_fetch_array($datapembeli)) {
                                $namalengkap = $row2["namalengkap"];
                                echo $namalengkap;
                            }
                            ?>
                        </h2>
                        <h2 class="fs-5">Alamat :
                            <?php
                            $ids = $_SESSION['id'];
                            $datapembeli = mysqli_query($con, "SELECT * from tbluser where id='$ids' order by id asc");
                            while ($row2 = mysqli_fetch_array($datapembeli)) {
                                $alamat = $row2["alamat"];
                                echo $alamat;
                            }
                            ?>
                        </h2>
                        <h2 class="fs-5">No Telp :
                            <?php
                            $ids = $_SESSION['id'];
                            $datapembeli = mysqli_query($con, "SELECT * from tbluser where id='$ids' order by id asc");
                            while ($row2 = mysqli_fetch_array($datapembeli)) {
                                $nomor = $row2["nomor"];
                                echo $nomor;
                            }
                            ?>
                        </h2>
                        <?php
                        $akun = $_SESSION['id'];
                        $sql = "SELECT id, namalengkap, nomor, alamat FROM tbluser where id = '$akun'";
                        $query = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                        </div>
                        <br>
                        <h2 class="fs-6">Ingin Menggubah Profil anda?
                            <a href="akun.php?id=<?php echo $row["id"]; ?>">
                                Klik Disini
                            </a>
                        </h2>

                        <?php
                        }
                        ?>
                    <hr />
                    <div class="col-md-4 col-6">
                        <h2 class="fw-bold fs-5">Jumlah :</h2>
                        <h2 class="fs-5"><?php echo $jumlah; ?></h2>
                        <h2 class="fw-bold fs-5 text-danger">Total :</h2>
                        <h2 class="fs-5"><?php $totalx = $jumlah * $hargax;
                        echo "Rp. " . number_format($totalx) . ",-"; ?></h2>
                    </div>
                    <hr />
                    <?php
                }
                ?>
                <div class="row tombol">
                    <div class="btn-group pull-right">
                        <a href="produk.php"><button type="button"
                                class="btn btn-secondary ps-4 pe-4 me-2 float-right">Batal</button></a>
                        <form action="simpancheckout.php" method="POST">
                            <input name="idproduk" type="hidden" value="<?php echo $idx ?>">
                            <input name="iduser" type="hidden" value="<?php echo $ids ?>">
                            <input name="jumlah" type="hidden" value="<?php echo $jumlah ?>">
                            <input name="totalx" type="hidden" value="<?php echo $totalx ?>">
                            <button type="submit" name="checkout"
                                class="btn text-white btnCeheckout ps-4 pe-4 me-4">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end product -->
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Maven+Pro:wght@400..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Kalam:wght@300;400;700&family=Maven+Pro:wght@400..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap');

    body {
        margin-top: 37px;
        background: linear-gradient(180deg, #ffffff 0, #ffffeb 16.67%, #fff5d2 33.33%, #f7e3b7 50%, #efd19d 66.67%, #e8c086 83.33%, #e3af72 100%);
    }


    .product-content {
        border: 1px solid #dfe5e9;
        margin-bottom: 20px;
        margin-top: 12px;
        background: #fff
    }

    .product-content .carousel-control.left {
        margin-left: 0
    }

    .product-content .product-image {
        background-color: #fff;
        display: block;
        min-height: 238px;
        overflow: hidden;
        position: relative
    }

    .product-content .product-deatil {
        border-bottom: 1px solid #dfe5e9;
        padding-bottom: 17px;
        padding-left: 16px;
        padding-top: 16px;
        position: relative;
        background: #fff
    }

    .product-content .product-deatil h5 a {
        color: #2f383d;
        font-size: 15px;
        line-height: 19px;
        text-decoration: none;
        padding-left: 0;
        margin-left: 0
    }

    .product-content .product-deatil h5 a span {
        color: #9aa7af;
        display: block;
        font-size: 13px
    }

    .product-content .product-deatil span.tag1 {
        border-radius: 50%;
        color: #fff;
        font-size: 15px;
        height: 50px;
        padding: 13px 0;
        position: absolute;
        right: 10px;
        text-align: center;
        top: 10px;
        width: 50px
    }

    .product-content .product-deatil span.sale {
        background-color: #21c2f8
    }

    .product-content .product-deatil span.discount {
        background-color: #71e134
    }

    .product-content .product-deatil span.hot {
        background-color: #fa9442
    }

    .product-content .description {
        font-size: 12.5px;
        line-height: 20px;
        padding: 10px 14px 16px 19px;
        background: #fff
    }

    .product-content .product-info {
        padding: 11px 19px 10px 20px
    }

    .product-content .product-info a.add-to-cart {
        color: #2f383d;
        font-size: 13px;
        padding-left: 16px
    }

    .product-content name.a {
        padding: 5px 10px;
        margin-left: 16px
    }

    .product-info.smart-form .btn {
        padding: 6px 12px;
        margin-left: 12px;
        margin-top: -10px
    }

    .product-entry .product-deatil {
        border-bottom: 1px solid #dfe5e9;
        padding-bottom: 17px;
        padding-left: 16px;
        padding-top: 16px;
        position: relative
    }

    .product-entry .product-deatil h5 a {
        color: #2f383d;
        font-size: 15px;
        line-height: 19px;
        text-decoration: none
    }

    .product-entry .product-deatil h5 a span {
        color: #9aa7af;
        display: block;
        font-size: 13px
    }

    .load-more-btn {
        background-color: #21c2f8;
        border-bottom: 2px solid #037ca5;
        border-radius: 2px;
        border-top: 2px solid #0cf;
        margin-top: 20px;
        padding: 9px 0;
        width: 100%
    }

    .product-block .product-deatil p.price-container span,
    .product-content .product-deatil p.price-container span,
    .product-entry .product-deatil p.price-container span,
    .shipping table tbody tr td p.price-container span,
    .shopping-items table tbody tr td p.price-container span {
        color: #21c2f8;
        font-family: Lato, sans-serif;
        font-size: 24px;
        line-height: 20px
    }

    .product-info.smart-form .rating label {
        margin-top: 0
    }

    .product-wrap .product-image span.tag2 {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        padding: 10px 0;
        color: #fff;
        font-size: 11px;
        text-align: center
    }

    .product-wrap .product-image span.sale {
        background-color: #57889c
    }

    .product-wrap .product-image span.hot {
        background-color: #a90329
    }

    .shop-btn {
        position: relative
    }

    .shop-btn>span {
        background: #a90329;
        display: inline-block;
        font-size: 10px;
        box-shadow: inset 1px 1px 0 rgba(0, 0, 0, .1), inset 0 -1px 0 rgba(0, 0, 0, .07);
        font-weight: 700;
        border-radius: 50%;
        padding: 2px 4px 3px !important;
        text-align: center;
        line-height: normal;
        width: 19px;
        top: -7px;
        left: -7px
    }

    .description-tabs {
        padding: 30px 0 5px !important
    }

    .description-tabs .tab-content {
        padding: 10px 0
    }

    .product-deatil {
        padding: 30px 30px 50px
    }

    .product-deatil hr+.description-tabs {
        padding: 0 0 5px !important
    }

    .product-deatil .carousel-control.left,
    .product-deatil .carousel-control.right {
        background: none !important
    }

    .product-deatil .glyphicon {
        color: #3276b1
    }

    .product-deatil .product-image {
        border-right: none !important
    }

    .product-deatil .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .product-deatil .name small {
        display: block
    }

    .product-deatil .name a {
        margin-left: 0
    }

    .product-deatil .price-container {
        font-size: 24px;
        margin: 0;
        font-weight: 300
    }

    .product-deatil .price-container small {
        font-size: 12px
    }

    .product-deatil .fa-2x {
        font-size: 16px !important
    }

    .product-deatil .fa-2x>h5 {
        font-size: 12px;
        margin: 0
    }

    .product-deatil .fa-2x+a,
    .product-deatil .fa-2x+a+a {
        font-size: 13px
    }

    .profile-message ul {
        list-style: none;
    }

    .product-deatil .certified {
        margin-top: 10px
    }

    .product-deatil .certified ul {
        padding-left: 0
    }

    .product-deatil .certified ul li:not(first-child) {
        margin-left: -3px
    }

    .product-deatil .certified ul li {
        display: inline-block;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        padding: 13px 19px
    }

    .product-deatil .certified ul li:first-child {
        border-right: none
    }

    .product-deatil .certified ul li a {
        text-align: left;
        font-size: 12px;
        color: #6d7a83;
        line-height: 16px;
        text-decoration: none
    }

    .product-deatil .certified ul li a span {
        display: block;
        color: #21c2f8;
        font-size: 13px;
        font-weight: 700;
        text-align: center
    }

    .product-deatil .message-text {
        width: calc(100% - 70px)
    }

    @media only screen and (min-width:1024px) {
        .product-content div[class*=col-md-4] {
            padding-right: 0
        }

        .product-content div[class*=col-md-8] {
            padding: 0 13px 0 0
        }

        .product-wrap div[class*=col-md-5] {
            padding-right: 0
        }

        .product-wrap div[class*=col-md-7] {
            padding: 0 13px 0 0
        }

        .product-content .product-image {
            border-right: 1px solid #dfe5e9
        }

        .product-content .product-info {
            position: relative
        }
    }

    .message img.online {
        width: 40px;
        height: 40px;
    }

    .tombol {
        float: right;
    }

    .btnCeheckout {
        background: #00ff00;
    }

    .btnCeheckout:hover {
        background: #00e600;
        color: #ffffff;
    }

    .font-1 {
        font-family: "Source Sans 3", sans-serif;
        font-weight: 400;

    }

    .heavenly {
        font-family: "Kalam", cursive;
        font-weight: 500;
    }

    .font-2 {
        font-family: "Maven Pro", sans-serif;
        font-weight: 500;
    }

    .font-3 {
        font-family: "DM Sans", sans-serif;
        font-weight: 500;
    }
</style>