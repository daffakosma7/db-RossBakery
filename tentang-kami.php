<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ross Bakery | Tentang Kami</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333; /* Warna teks */
            background-color: #ffdeaf;
        }
         
        .logo {
            text-align: center;
            margin-bottom:  20px;
        }

        .logo img {
            max-width: 45%;
            height: auto;
            border-radius: 5px;
            margin-top: 80px;
        }

        .content {
            font-family: 'Georgia', serif; /* or a similar serif font */
            font-size: 18px; /* adjust as needed */
            color: #013220; /* match the text color */
            background-color: #ffde; /* match the background color */
            padding: 20px;
            border-radius: 5px;
            line-height: 1.6; /* adjust line height for readability */
            text-align: justify;
            max-width: 800px; /* adjust as needed */
            margin: 0 auto; /* center the text block */
        }

        .content p {
            text-align: center;
            margin-bottom: 1em;
            line-height: 1.6;
        }

        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Add some space between images */
        }

        .image-gallery img {
            text-align: center;
            width: calc(33% - 10px); /* Adjust width for two columns with spacing */
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            object-fit: cover; /* Ensures the image covers the square without distortion */
            aspect-ratio: 1 / 1; /* Ensures the image is square */
        }

    </style>
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- main -->
    <div class="container-fluid py-5">
        <div class="container fs-5">
            <div class="logo py-2" data-aos="fade-up" data-aos-duration="1000" >
                <img src="image/RB-jagakarsa.jpg" alt="Ross Bakery Logo">
            </div>
            <div class="content mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <p>
                    Ross Bakery adalah toko roti yang berdiri sejak tahun 2017 yang dibangun oleh kedua orang tua kami.
                    Karena ibu kami memiliki passion di bidang kewirausahaan dan suka membuat kue dan roti, 
                    berdirilah toko kami yaitu Ross Bakery yang terinspirasi dari nama ibu kami Rosdiana.
                </p>
                <p>
                Toko roti Ross Bakery berdiri sejak tahun 2017 yang dimana usaha ini dibangun oleh kedua orang tua kami.
                        karna ibu saya memiliki passion di bidang kewirausahaan dan ibu saya suka membuat kue dan roti makan berdirilah
                        toko toko kami yaitu Ross Bakery yang dimana Ross terispirasi dari nama ibu kami Rosdiana

                </p>
                <hr class="my-3" >
                <p>
                    Dan kami dari toko Ross Bakery juga mengadakan kegiatan rutin yang biasa kami sebut "jum'at berkah". Yang dimana setiap hari jumat kami mengeluarkan
                    sekitar 50 pcs roti untuk di bagikan di depan toko kami maupun kami kirim juga ke yayasan panti asuhan terdekat.
                    Dan alhamdulillah dengan adanya kegiatan sosial ini banyak juga dari customer kami yang ikut andil mengikuti rutinan jum'at berkah dengan membelinya produk kami
                    untuk di salurkan juga ke panti asuhan sekitar.
                </p>
            </div>
            <div class="image-gallery" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <img src="image/mizan-zikon.jpg" alt="">
                <img src="image/mizan-zikon-2.jpg" alt="">
                <img src="image/mizan-3.jpg" alt="">
                <img src="image/jumat-berkah.jpg" alt="">
                <img src="image/jumat-berkah-2.jpg" alt="">
                <img src="image/jumat-berkah-3.jpg" alt="">
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
