<?php
session_start();

function removeFromCart($product_id) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                $total_price = 0;
                foreach ($_SESSION['cart'] as &$item) {
                    $total_price += $item['price'] * $item['quantity'];
                }
            
                $_SESSION['total'] = $total_price;
                break;
            }
        }
    }
}

function updateQuantity($product_id, $new_quantity) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] = $new_quantity;
                $total_price = 0;
                foreach ($_SESSION['cart'] as &$item) {
                    $total_price += $item['price'] * $item['quantity'];
                }
            
                $_SESSION['total'] = $total_price;
                break;
            }
        }
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'delete' && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        removeFromCart($product_id);
        header("Location: cart.php");
        exit();
    } elseif ($_POST['action'] == 'update' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $new_quantity = $_POST['quantity'];
        updateQuantity($product_id, $new_quantity);
        header("Location: cart.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ross Bakery | Keranjang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- Midtrans -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-wxvJIyW0DdJZBToH"></script>
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container py-5 mt-5">
        <h2>Your Cart</h2>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($_SESSION['cart'] as $item): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td class="price"><?php echo number_format(htmlspecialchars($item['price']), 0, ',', '.'); ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" max="99" class="form-control form-control-sm w-75" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="price"><?php echo number_format(htmlspecialchars($item['price'] * $item['quantity']), 0, ',', '.'); ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Total</h5>
                                <p class="card-text" id="totalPrice"><?php echo number_format(htmlspecialchars($_SESSION['total']), 0, ',', '.'); ?></p>
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
                            <button class="btn btn-custom mt-4 w-100" id="checkout-button" style=" background-color: #f1be71fe;
                            color: black;">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const totalPriceElement = document.getElementById('totalPrice');
            const priceElements = document.getElementsByClassName('price');

            totalPriceElement.textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(totalPriceElement.textContent.replace(/[^0-9]/g, ''));

            for (var i = 0; i < priceElements.length; i++) {
                priceElements[i].textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(priceElements[i].textContent.replace(/[^0-9]/g, ''));
            }

            document.getElementById('checkout-button').addEventListener('click', async function() {
                const name = document.getElementById('name').value
                const email = document.getElementById('email').value
                const phone = document.getElementById('phone').value
                const address = document.getElementById('address').value
                const city = document.getElementById('city').value
                const postalCode = document.getElementById('postalCode').value
                
                if (name === '' || email === '' ||  phone === '' ||   address === '' ||  city === '' || postalCode === '') {
                alert('Please fill in all required fields.');
                return;
            }

                const items = [
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                    {
                        id: '<?php echo $item['id']; ?>',
                        name: '<?php echo $item['name']; ?>',
                        price: '<?php echo $item['price']; ?>',
                        quantity: '<?php echo $item['quantity']; ?>',
                    },
                    <?php endforeach; ?>
                ]

                const total = '<?php echo $_SESSION['total']; ?>';
                    
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

                const token = await response.text();
                
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
