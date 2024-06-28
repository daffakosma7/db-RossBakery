<?php
    require "js/koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($con, "SELECT * FROM  produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ross Bakery | Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .card {
            border-radius: 15px;
        }
        .btn-custom {
            border-radius: 25px;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .btn-add-to-cart {
            background-color: #f0f4f8;
            color: black;
        }
        .btn-buy-now {
            background-color: #f1be71fe;
            color: black;
        }
        .quantity-control {
            display: flex;
            align-items: center;
        }
        .quantity-control input {
            text-align: center;
            width: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 10px;
        }
    </style>

</head>
<body>
    <?php require "navbar.php"; ?>
    
    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="text-harga">
                        Rp <?php echo $produk['harga']; ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>

                    <!-- pilih jumlah -->
                    <div class="mt-4">
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="quantity-control">
                                    <button class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                                    <input type="number" id="quantity" value="1" min="1">
                                    <button class="btn btn-outline-secondary" id="increaseQuantity">+</button>
                                </div>
                                <div>
                                    <span id="price">Rp 395.000</span>
                                </div>
                            </div>
                            <button class="btn btn-custom btn-add-to-cart mt-3">Add to Cart</button>
                            <button class="btn btn-custom btn-buy-now">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk terkait</h2>
            <div class="row">
                <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
                <div class=" col-md-6 col-lg-3 mb-3">
                    <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                        <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require "footer.php"; ?>
                        
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script>
        document.getElementById('decreaseQuantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        document.getElementById('increaseQuantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    </script>
</body>
</html>
