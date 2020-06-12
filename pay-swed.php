<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - Swedbank - Pangalink-net</title>
    </head>
    <body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
"-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEA5dzzI12YuxBLaKFsSKEclEkFBnJJau1EygA6U5VtITnLRM1M
oy6VBbeRkTMQOgq6qgVgN0gcJ2OP/42+ZvRcOPlS1NRbF2SUnxkp+wZlxSf0/jsU
uFx98VyZtSYU9IB2MtLn6z8skF6KottHJMArg8GIpC77FPOY88+DJoW1QUyuAFz7
A79T2uMBBddY0SQNoOuMAULoopIzERyRZZZrDvWAOKdyq1sJMsytlqovUYjKBSUX
8J2BioiKun4hjqg8MBu0QHFVPvZtMN8H/WlGU4j3ol94M7KOPMJeH0FRmqbtu8xu
pZnb/Fk40p2WYR7phBqMm34MODMGJDWQpH5LNQIDAQABAoIBAQDBRiwGQ4/FUmkl
m/1RgG5oXJFmHziOONzLQK/KUe1Fr7OzsS/MUcGp4fT68sWlGBpmFUkWkoJhuDx+
827yYGse2L0GCVxiagbxU5ZR5MozoWpFTeYZMmQPSv5PK6sY/t7j0ySAUEknRucp
EllalF7CVTuQWZRyxHSKJKSxAmIqeTgnoZHWZyCb11YQsHnY77KYV74TAmi1290G
CVg2Gg2knp5QHumvRAeh1S/XrjrCZOg0H5+cIpD91GC/B9CDNzYJfCIinsN/E4NI
3ds/Vd85G06Oix06NucEPdK7VwPOKk5mWPTlQZVCG5kMqHCQ1uWlEcTrbHcoWK29
rVi6oLsBAoGBAPXPq6H1r+ekmK8U26m9TpExX8LlTX84Nn76shWrmEtUk0GyjcGD
mQ3mi3NF2Gsq/dLByd7OrWgpDqAm4jawjlWdzQmy60znRvBYRJefije4Bvr6mP+X
WjAguKBe9bWu616IWMMVAd1Qugoyi0o0/4OM/jnTup/oF5ylvFQVf13BAoGBAO9k
DU++v9n8ItBNuhbPEhwUXlEARKZVPa8D0675vnq3FFiJQ1UFe7dcMehpvQyRsThh
pG5U0jeyVR/hErbTmm1Bd5K7HxC1yv0IUYBUDfBKNLnrwcoTZjqvgaoyXdCWiPqx
upz4xVMua+cFMQ9n1gWxbZ9sfhyOi7T8EHvkqPJ1AoGBANhFQA/+dycKtV+NrXrZ
WU/7rfJvB1FAZwovjhHs6NCWd/1cmMZC/52wUs84C6K2r54H7JIBK6ayQPD9ZRiT
HJgNf8Hhzo7aCZsbPjZdIyHE4zdc1tJCGxKvJ2HKSsrwPJvuwJHbYMmU5ipksBK5
MHpQybidJdzdOjETzO/5/hbBAoGAWXpcP2Jc82161cE3vS7I5hX26u/euQ1DcRdN
GCnhOJ0VzcIAmNbj1zVusiBTuU77nsdgXpz1tjvB9Zh7FjshjZTazM2EXwqURN/H
FuBUFWynKJcmaBG4NFdFcAhDaKPbr1ifF+0kVGMVkdQu8kMtjBM1llFHEgV10sAk
qSpeu8ECgYEA6JZexXe/g4rxFpsNFZxDf0ZhoSywut8AG3vNpHdMq8WNwPtSFbMy
SKkEfh56BGirgvlTCC0e0Qa6eZTIgcqG8m0Lr8kbt1WO6Dz2cMo+apZWxIeLXPRR
z3eZiHQNlWH0YsGVcTn6D5qNcEfeSuMcOXFA6nanCBG7P9mvEkQFvW0=
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100010",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE152200221234567897",
        "VK_NAME"        => "ÕIE MÄGER",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=success",
        "VK_CANCEL"      => "http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=cancel",
        "VK_DATETIME"    => "2020-06-11T18:00:01+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-06-11T18:00:01+0300 */

/* $data = "0041011003008009uid10001000512345003150003EUR020EE152200221234567897009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=success068http://localhost:8080/project/Fptx7kVjNU1h9JaI?payment_action=cancel0242020-06-11T18:00:01+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* sfplm31WpdUyTW+R/X5iWW1rycYYpul1UPB714k63VH34EnJ6OcZbTswmCx2Mt6dixgebRQYBc1OG2VLpotb1CqX5h1Z0bZHrA4hsraL3f90PWMM17QaqMTVYB84h7q2305zM2qw872idhyTustcc/GMaxVcOHfTEztUSFcmRcc1nGEgJh7QjP0dZXvh/m0JwuZ8ZjoXSzSybuodGh68XmFM78J3CrW//BdW2eJNBJn51hhyvRdZFCusmh2Yypyl0kIUGerbDbffXbD0FfumcGV2+/xromBJ2ASBCZAelYcRP8qCUXbP9LvwY9VO/rs/eeXk6VqLPDCrrW/p8+iz2A== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"Swed"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/swedbank-common">
            <!-- include all values as hidden form fields -->
<?php foreach($fields as $key => $val):?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
<?php endforeach; ?>

            <!-- draw table output for demo -->
            <table>
<?php foreach($fields as $key => $val):?>
                <tr>
                    <td><strong><code><?php echo $key; ?></code></strong></td>
                    <td><code><?php echo htmlspecialchars($val); ?></code></td>
                </tr>
<?php endforeach; ?>

                <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
                <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
            </table>
        </form>

    </body>
</html>
