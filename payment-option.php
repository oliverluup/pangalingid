<?php
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);
$total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_FLOAT);

$paymentOption = $_POST['paymentOption'];

if (isset($_POST['submit']) && $paymentOption == 'SEB') {
    echo '<form method="post" action="pay.php" id="pay">
                    <input type="hidden" name="product" value="<?php echo $item[\'id\']; ?>">
                    <tr>
                        <input type="hidden" name="firstName" value="' . $firstName . '">
                        <input type="hidden" name="lastName" value="' . $lastName . '">
                        <input type="hidden" name="email" value="' . $email . '">
                        <input type="hidden" name="number" value="' . $number . '">
                        <input type="hidden" name="total" value="' . $_POST['total'] . '">
                    </tr>
                </form>
                <script type="text/javascript">
                    document.getElementById("pay").submit(); // SUBMIT FORM
                </script>';
} else if (isset($_POST['submit']) && $paymentOption == 'SWED') {
    echo '<form method="post" action="pay-swed.php" id="pay-swed">
                    <input type="hidden" name="product" value="<?php echo $item[\'id\']; ?>">
                    <tr>
                        <input type="hidden" name="firstName" value="' . $firstName . '">
                        <input type="hidden" name="lastName" value="' . $lastName . '">
                        <input type="hidden" name="email" value="' . $email . '">
                        <input type="hidden" name="number" value="' . $number . '">
                        <input type="hidden" name="total" value="' . $total . '">
                    </tr>
                </form>
                <script type="text/javascript">
                    document.getElementById("pay-swed").submit(); // SUBMIT FORM
                </script>';
}