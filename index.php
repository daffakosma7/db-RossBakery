<?php
    require "js/koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <metah http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ross Bakery | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
            <div class="container-fluid banner d-flex align-items-center">
            <div class="container text-white text-center" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="display-4">Selamat Datang <br> <span class="display-5">Makan Apa Hari Ini ?</span></h1>
                <hr class="my-3">
                <p class="lead custom-font">Jl. Yon Zikon 14 No.20, Srengseng Sawah, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630</p>
                <i class="fa-solid fa-bell fa-shake"></i> <span class="time-text">07.00 - 21.00 WIB || Setiap Hari</span>
            </div>
        </div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center" data-aos="fade-up" data-aos-duration="1000">
            <h3 class="produk-title">Kategori Terlaris</h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-3" >
                    <div class="highlighted-kategori kategori-roti-asin d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                        <h4 class="text-white"><a class="no-decoration" href="produk-detail.php?nama=Roti%20Abon">Roti Abon</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3" >
                    <div class="highlighted-kategori kategori-roti-manis d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <h4 class="text-white"><a class="no-decoration" href="produk-detail.php?nama=Roti%20coklat">Roti Coklat</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-pastry d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <h4 class="text-white"><a class="no-decoration" href="produk-detail.php?nama=Cromboloni">Cromboloni</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna1 py-5 mt-2">
        <div class="container text-center"  data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" style="font-family: Georgia, serif;">
            <h3>ROSS'BAKERY</h3>
            <p class="fs-5 mt-3">
            Di Toko Roti ini, kami percaya bahwa roti yang enak berasal dari bahan-bahan yang terbaik dan 
            proses pembuatan yang penuh dedikasi. Oleh karena itu, kami hanya menggunakan bahan-bahan segar 
            dan alami dalam setiap roti yang kami buat. Dari tepung gandum pilihan hingga susu segar, setiap 
            bahan dipilih dengan cermat untuk memastikan kualitas terbaik.
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center" >
            <h3 class="produk-title">Produk</h3>

            <div class="row mt-5" >
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-4" >
                    <div class="card h-100" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" >
                        <div class="image-box">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body" >
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-light
                            warna2 text-wait">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-warning mt-3" href="produk.php">See More</a>
        </div>
    </div>

    <!-- footer -->
     <?php require  "footer.php"; ?>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>