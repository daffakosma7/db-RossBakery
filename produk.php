<?php
    require "js/koneksi.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    // get produk by nama produk/keyword
    if(isset($_GET['keyword'])){
        $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$keyword%'");
    }
    // get produk by kategori 
    else if(isset($_GET['kategori'])){
        $kategori = mysqli_real_escape_string($con, $_GET['kategori']);
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$kategori'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    // get produk default 
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }

    $countData = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ross Bakery | Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
     <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" >
            <h1 class="text-white text-center custom-margin-top-produk produk-title">"Nikmati Produk Kami Setiap Hari"</h1>
        </div>
     </div>

     <!-- body -->
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 mb-5 kategori-box" data-aos="fade-up">
                    <h3 class="produk-title">Kategori</h3>
                    <ul class="list-group" style="font-family: 'Georgia', serif;">
                        <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                        <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                        <?php } ?>
                    </ul>
                </div>
        
                <div class="col-lg-9 produk-box" data-aos="fade-up">
                <h3 class="text-center mb-3 produk-title">Produk</h3>
                <div class="row" data-aos="fade-up">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
                    <?php
                    }
                    ?>
                    <?php
                    $delay = 0; // initialize delay variable
                    while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                                    <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                    <p class="card-text text-harga">Rp <?php echo $produk['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?php echo urlencode($produk['nama']); ?>" class="btn warna2 text-wait">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        $delay += 10; // increment delay for each product
                    } ?>
                </div>
            </div>
        </div>
    </div>
      <!-- footer -->
       <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
