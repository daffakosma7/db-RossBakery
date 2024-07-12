<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar with Icons</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<style>
.navbar {
    border-bottom: 5px solid #db9c3e; /* Warna coklat (#8B4513) bisa disesuaikan sesuai keinginan */
    background-color: #fff; /* Warna latar belakang coklat */
}

.btn-outline-light.warna5 {
    color: #8B4513; /* Warna teks coklat */
    border-color: #8B4513; /* Warna border coklat */
}

.btn-outline-light.warna5:hover {
    background-color: #8B4513; /* Warna latar belakang coklat saat di-hover */
    color: white; /* Warna teks putih saat di-hover */
}

</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="image/logo-ross-bakery.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <div class="col-md-5 offset-md-1 ">
                    <form method="get" action="produk.php">
                        <div class="input-group input-group-lg my-2 ">
                             <input type="text" class="form-control" placeholder="Cari Apa" 
                             aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                            <button type="submit" class="btn btn-light warna2">Telusuri</button>
                        </div>
                    </form>
                </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item me-4">
                    <a class="nav-link fw-bold warna5" href="index.php">Home</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-bold warna5" href="tentang-kami.php">Tentang Kami</a>
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link fw-bold warna5" href="produk.php">Produk</a>   
                </li>
                <li class="nav-item me-4">
                    <a class="nav-link  fw-bold warna5" href="cart.php">
                        <i class="fas fa-shopping-cart"></i> Keranjang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
