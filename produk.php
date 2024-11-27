<?php include ('koneksi.php');
include ('link.php');
include ('navbar.php');
$qproduk = mysqli_query($con, "SELECT * from tblproduk order by namaproduk asc"); ?>

<!--catalogue-->
<div class="produk">
  <main class="mt-2 mb-5">
    <div class="container">
      <div class="row">
        <?php
        while ($row = mysqli_fetch_array($qproduk)) {
          ?>
          <div class="col-md-4 col-sm-6 col-12 mb-3 mt-3">
            <div class="card shadow">
              <?php
              $idx = $row["id"];
              ?>
              <img class="card-img-top p-5" src="assets/<?= $row["gambar"] ?>" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title"><?= $row["namaproduk"] ?></h5>
                <h6><?php echo "Rp. " . number_format($row["harga"]) . ",-"; ?></h6>
                <h6 class="mt-4">Jumlah</h6>

                <form action="produkdetail3.php" method="POST">
                  <input name="id" type="hidden" value="<?= $row["id"] ?>">
                  <input type="number" min="1" max="10" class="form-control w-50 mx-auto d-block text-center mb-4"
                    name="jumlah" value="0">
                  <button type="submit" name="totalproduk" class="btn btn-dark text-white w-75">Beli</button>
                </form>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
  </main>
</div>

<style>
  /* Ensure images are responsive */
  .card-img-top {
    width: 100%;
    height: auto;
  }

  /* Adjust padding for smaller screens */
  @media (max-width: 576px) {
    .card .p-5 {
      padding: 1rem !important;
      /* Override with smaller padding */
    }
  }

  /* Center card text on smaller screens */
  @media (max-width: 768px) {
    .card-body {
      text-align: center;
    }
  }

  /* Adjust card margins for smaller screens */
  @media (max-width: 576px) {
    .col-md-4 {
      margin-bottom: 1.5rem;
      /* More margin for small screens */
    }
  }
</style>