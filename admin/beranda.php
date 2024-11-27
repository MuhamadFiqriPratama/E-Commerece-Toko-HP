<?php
include ('link.php');
include ('navbar.php');
?>

<!--Banner-->

<body class="bg-light">
    <div class="beranda">
        <div class="">
            <div class="banner-image w-100 d-flex justify-content-center align-items-center">
                <div class="content text-center">
                    <img src="../assets/Heavenly3.png" class="w-100" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!--promotion-->
    <div class="mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner pe-3 ps-3">
                <div class="carousel-item active">
                    <img src="../assets/Banner_1.png" class="d-block w-100 rounded-2" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Banner_2.png" class="d-block w-100 rounded-2" alt="...">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner pe-3 ps-3">
                <div class="carousel-item active">
                    <img src="../assets/Banner 3.png" class="d-block w-100 rounded-2" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/Banner_4.png" class="d-block w-100 rounded-2" alt="...">
                </div>
            </div>
        </div>
    </div>

    <!--servis-->

    <section id="layanan">
        <div class="container">
            <div class="col-12 text-center">
                <h2 class="fw-bold text-dark fs-2 pb-5">Pelayanan</h2>
            </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto shadow">
                            <img src="../assets/customer-support.svg" alt="icon 1"
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4 fs-4">Customer support</h3>
                        <p class="mt-3 fs-6">Dapat dengan mudah menghubungi kami</p>
                    </div>

                </div>
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto shadow">
                            <img src="../assets/fast-delivery.svg" alt="icon 1"
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4 fs-4">Fast Delivery</h3>
                        <p class="mt-3 fs-6">Pengiriman lebih cepat sampai ke alamat tujuan</p>
                    </div>

                </div>
                <div class="col-md-4 text-center">
                    <div class="card-layanan">
                        <div class="circle-icon position-relative mx-auto shadow">
                            <img src="../assets/check.svg" alt="icon 1"
                                class="position-absolute top-50 start-50 translate-middle">
                        </div>
                        <h3 class="mt-4 fs-4">Terverifikasi</h3>
                        <p class="mt-3 fs-6">Tidak ada unsur penipuan</p>
                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
</body>

<style>
    #layanan {
        padding: 100px 0;
    }

    .card-layanan {
        width: 100%;
        height: 313px;
        border-radius: 5px;
        background: linear-gradient(190deg, rgb(239, 250, 181), rgb(250, 254, 48));
        padding: 50px;
        box-shadow: 0 0 7px 3 px rgba(0, 0, 0, 0.5);
    }

    .circle-icon {
        width: 90px;
        height: 90px;
        background-color: rgb(255, 255, 255);
        border-radius: 50%;
        transition: all 0.2s ease-in;
    }

    .card-layanan:hover {
        width: 100%;
        height: 313px;
        border-radius: 5px;
        background: linear-gradient(190deg, rgb(154, 233, 255), rgb(42, 61, 233));
        padding: 50px;
        box-shadow: 0 0 7px 3 px rgba(0, 0, 0, 0.5);
        transition: all 0.2s ease-out;
    }
</style>


<?php
include ('footer.php');
?>