<?php
require_once 'autoload.php';

$payment_action = filter_input(INPUT_GET, 'payment_action', FILTER_SANITIZE_STRING);

if ($payment_action == 'success') {
    $_SESSION['message'] = 'Payment successful';
    unset($_SESSION['cart']);
    header('Location: https://pangalingid.tak17luup.itmajakas.ee/');
}
