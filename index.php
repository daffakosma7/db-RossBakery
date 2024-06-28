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
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
    <div class="container text-center text-white">
        <h1>Selamat Datang</h1>
        <h3>Makan Apa Hari Ini?</h3>
        <div class="col-md-8 offset-md-2">
            <form method="get" action="produk.php">
                <div class="input-group input-group-lg my-4">
                     <input type="text" class="form-control" placeholder="Cari Apa" 
                    aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                     <button type="submit" class="btn warna2">Telusuri</button>
                 </div>
            </form>
        </div>
    </div>
</div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
                <h3>Kategori Terlaris</h3>

                <div class="row mt-5">
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori kategori-roti-asin d-flex justify-content-center
                        align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Roti Asin">Roti Abon</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori kategori-roti-manis d-flex justify-content-center
                        align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Roti Manis">Roti Coklat</a></h4>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="highlighted-kategori kategori-pastry d-flex justify-content-center
                        align-items-center">
                            <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Pastry">Cromboloni</a></h4>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna1 py-5 mt-2">
        <div class="container text-center">
            <h3>ROSS'BAKERY</h3>
            <p class="fs-5 mt-3">
            Di Toko Roti Lezat, kami percaya bahwa roti yang enak berasal dari bahan-bahan yang terbaik dan 
            proses pembuatan yang penuh dedikasi. Oleh karena itu, kami hanya menggunakan bahan-bahan segar 
            dan alami dalam setiap roti yang kami buat. Dari tepung gandum pilihan hingga susu segar, setiap 
            bahan dipilih dengan cermat untuk memastikan kualitas terbaik.
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp <?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn 
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
</body>
</html>