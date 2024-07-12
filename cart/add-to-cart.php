<?php
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$product_id = $data['product_id'];
$product_name = $data['product_name'];
$product_price = $data['product_price'];
$quantity = $data['quantity'];

$cart_item = array(
    'id' => $product_id,
    'name' => $product_name,
    'price' => $product_price,
    'quantity' => $quantity
);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $product_id) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}

if ($found) {
    $total_price = 0;
    foreach ($_SESSION['cart'] as &$item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $_SESSION['total'] = $total_price;
    echo json_encode(array('status' => 'duplicate', 'message' => 'Product quantity updated in the cart', 'total' => $_SESSION['total']));
} else {
    $_SESSION['cart'][] = $cart_item;
    $total_price = 0;
    foreach ($_SESSION['cart'] as &$item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $_SESSION['total'] = $total_price;
    echo json_encode(array('status' => 'success', 'message' => 'Product added to cart', 'total' => $_SESSION['total']));
}
?>
