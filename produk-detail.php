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

<!-- Midtrans -->
 <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-wxvJIyW0DdJZBToH"></script>

</head>
<body>
    <?php require "navbar.php"; ?>
    
    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container mt-5 pt-3">
            <div class="row">
                <div class="col-lg-5">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="text-harga" id="price">
                        <?php echo $produk['harga']; ?>
                    </p>
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>

                    <!-- pilih jumlah -->
                    <div class="mt-4">
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="quantity-control">
                                    <button class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                                    <input type="text" id="quantity" value="1">
                                    <button class="btn btn-outline-secondary" id="increaseQuantity">+</button>
                                </div>
                                <div>
                                    <span id="totalPrice"><?php echo $produk['harga']; ?></span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5>Informasi Customer</h5>
                               <div class="d-flex flex-column mt-3 gap-3">
                               <label for="name" class="d-flex align-items-center gap-2">
                                    <span>Nama: </span>
                                    <input type="text" id="name" placeholder="Masukkan Nama" name="name" class="form-control">
                                </label>
                                <label for="email" class="d-flex align-items-center gap-3">
                                    <span>Email: </span>
                                    <input type="email" id="email" placeholder="Masukkan Email" name="email" class="form-control">
                                </label>
                                <label for="phone" class="d-flex align-items-center gap-2 ">
                                    <span>No.HP: </span>
                                    <input type="text" id="phone" placeholder="Masukkan Nomor Telepon" name="phone" class="form-control">
                                </label>
                                <label for="address" class="d-flex align-items-center gap-2">
                                    <span>Alamat: </span>
                                    <input type="text" id="address" placeholder="Masukkan Alamat" name="address" class="form-control">
                                </label>
                                <label for="city" class="d-flex align-items-center gap-4">
                                    <span>Kota: </span>
                                    <input type="text" id="city" placeholder="Masukkan Kota" name="city" class="form-control">
                                </label>
                                <label for="postalCode" class="d-flex align-items-center gap-0">
                                    <span>Kode Pos:</span>
                                    <input type="text" id="postalCode" placeholder="Masukkan Kode Pos" name="postalCode" class="form-control">
                                </label>
                               </div>
                            </div>
                           
                            <button class="btn btn-custom btn-buy-now mt-3" id="pay-button">Buy Now</button>
                            <button class="btn btn-custom btn-add-to-cart" id="add-to-cart">Add to Cart</button>
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
        document.addEventListener('DOMContentLoaded', (event) => {
        const quantityInput = document.getElementById('quantity');
        const priceElement = document.getElementById('price');
        const totalPriceElement = document.getElementById('totalPrice');

        priceElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(priceElement.textContent);

        totalPriceElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(quantityInput.value * priceElement.textContent.replace(/[^0-9]/g, ''));

        let unitPrice = parseFloat(priceElement.textContent.replace(/[^0-9]/g, ''));

        const updateTotalPrice = () => {
            let quantity = parseInt(quantityInput.value);
            let totalPrice = unitPrice * quantity;
            totalPriceElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(totalPrice);
        };

        document.getElementById('decreaseQuantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotalPrice();
            }
        });

        document.getElementById('increaseQuantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotalPrice();
        });

        quantityInput.addEventListener('change', () => {
            if (quantityInput.value < 1) {
                quantityInput.value = 1;
            }
            updateTotalPrice();
        });

        // Add to cart
        document.getElementById('add-to-cart').addEventListener('click', async function () {
            const product_id = '<?php echo $produk['id']; ?>';
            const product_name = '<?php echo $produk['nama']; ?>';
            const product_price = '<?php echo $produk['harga']; ?>';
            const quantity = document.getElementById('quantity').value;

            const cartItem = {
                product_id,
                product_name,
                product_price,
                quantity
            };

            try {
                const response = await fetch('cart/add-to-cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(cartItem)
                });

                const result = await response.json();

                if (response.ok) {
                    if (result.status === 'success') {
                        alert(result.message);
                    } else if (result.status === 'duplicate') {
                        alert(result.message);
                    }
                } else {
                    alert('Failed to add product to cart');
                }
            } catch (error) {
                console.error('Error adding product to cart:', error);
                alert('Error adding product to cart');
            }
        });


        // Payment
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', async function () {
        const name = document.getElementById('name').value
        const email = document.getElementById('email').value
        const phone = document.getElementById('phone').value
        const address = document.getElementById('address').value
        const city = document.getElementById('city').value
        const postalCode = document.getElementById('postalCode').value
        const quantity = document.getElementById('quantity').value
        const total = document.getElementById('totalPrice').textContent

        if (name === '' || email === '' || phone === '' || address === '' || city === '' || postalCode === '') {
            alert('Please fill in all required fields.');
            return;
        }

        const items = [
            {
                id: '<?php echo $produk["id"]; ?>',
                price: '<?php echo $produk["harga"]; ?>',
                quantity: quantity,
                name: '<?php echo $produk["nama"]; ?>'
            }
        ];

        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('phone', phone);
        formData.append('address', address);
        formData.append('city', city);
        formData.append('postalCode', postalCode);
        formData.append('total', total);
        formData.append('items', JSON.stringify(items));

      try {
        const response = await fetch('payment/placeOrder.php', {
          method: 'POST',
          body: formData
        })

        const token = await response.text()
         
        window.snap.pay(token, {
                    onSuccess: function(result){
                        location.href = '/db-RossBakery'
                    },
                    onPending: function(result){
                        location.href = '/db-RossBakery'
                    },
                    onError: function(result){
                        location.href = '/db-RossBakery'
                    },
                    onClose: function(){
                        location.href = '/db-RossBakery'
                    }
                });
      } catch (error) {
        console.log(error)
      }
      });
    });
    </script>
</body>
</html>
