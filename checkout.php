<?php

require_once 'autoload.php';

$cart = $_SESSION['cart'];
$total = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Checkout</title>
</head>
<body>
<form action="https://pangalingid.tak17luup.itmajakas.ee/cart.php">
    <br>
    <div class="col-md-3 mb-3">
        <button type="submit" value="Go to cart" class="btn btn-secondary">Tagasi</button>
    </div>
</form>
<form class="form-group">
    <div class="col-md-3 mb-3">
        <table class="table">
            <tr>
                <th>Nimetus</th>
                <th>Hulk</th>
                <th>Summa</th>
            </tr>
            <?php if (!empty($cart)) : foreach ($cart as $item) { ?>

                <?php
                $price = $item['amount'] * $item['price'];
                $total += $price;
                ?>

                <form method="get" action="update-cart.php">
                    <input type="hidden" name="product" value="<?php echo $item['id']; ?>">
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['amount']; ?></td>
                        <td><?php echo $price; ?> €</td>
                    </tr>
                </form>
            <?php } endif; ?>
            <tr>
                <td>Kokku: <?php echo $total; ?> €</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</form>
<form class="needs-validation" method="post" action="payment-option.php" required>
    <div class="col-md-3 mb-3">
        <label for="validationTooltip01">Eesnimi</label>
        <input type="text" name="firstName" class="form-control" id="validationDefault01" required>

        <label for="validationTooltip02">Perekonna nimi</label>
        <input type="text" name="lastName" class="form-control" id="validationDefault02" required>

        <label for="validationTooltip05">E-mail</label>
        <input type="text" name="email" class="form-control" id="validationDefault03" required>

        <label for="validationTooltip03">Telefoni number</label>
        <input type="text" name="number" class="form-control" id="validationDefault04" required>

        <input type="hidden" name="total" class="form-control" id="validationDefault04" value="<?php echo $total; ?>">

        <label for="validationTooltip04">Makse valik</label>
        <select name="paymentOption" class="custom-select" id="validationDefault05" required>
            <option selected disabled value="">Vali...</option>
            <option name="SEB" value="SEB">SEB</option>
            <option name="SWED" value="SWED">Swedbank</option>
        </select>
        <hr>
        <button class="btn btn-success" name="submit" type="submit">Maksa</button>
    </div>
</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
