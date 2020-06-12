<?php

require_once 'autoload.php';

$productId = filter_input(INPUT_GET, 'product', FILTER_VALIDATE_INT);
$amount = filter_input(INPUT_GET, 'amount', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if (empty($_SESSION['cart'] && $productId)) {
    $_SESSION['message'] = 'Toodet pole';
    header('Location: cart.php');
}

if ($_GET['update'] == 'update') {
    $product = $products[$productId];
    $_SESSION['cart'][$product['id']]['amount'] = $amount;

    header('Location: cart.php');
} elseif ($_GET['delete'] == 'delete') {
    $product = $products[$productId];
    unset($_SESSION['cart'][$product['id']]);

    header('Location: cart.php');
}