<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Example payment usage - SEB - Pangalink-net</title>
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
MIIEowIBAAKCAQEAtQyo3kTYON8q200O8QWhKuQpUCOa3cdmi0c6A6mYxEPwKk7s
ove4oRmyMrjgaiPepHKGFAfOYNlUrNS42KaUyQRu102F8YNvTzyaQA8Nh9C4FYJL
s/dsZ/EFPCgyJ7VruaKMQDdKbXIU342Yp8FsvL9wGUtav3P66/pxQ7l0x1qyG960
X8plrQ3qovL8VrQnD7mpZix+HZbu90/Mav8zFV3MKew3C8O3hqQAAw4VVKPQ/25I
jfehE/6bHsQ+p9GuUO+eVvwzgVxODhKkVY2MUSEPll4Qdx02uHx3VMS6EhRpTnet
hUKzxEFK7SB8POO5Z+SGsOopFNb2nQ0YPfa38QIDAQABAoIBAB7WoDDz8wyE3szp
7ECbn98pa+wNlIRwQYQ5xqT3D2Fm3RKnzODZZyZxtQu0t+z8XSEPrMzeo4WVnzmt
Jiso/LDcw3CC8Oy5YY1SmkeNCNX4dFKdlf16iImP4T9k7V4cJdRB3rfVcyT/SJTn
jngMl1PzG8oDLtrri3MEfqR1g3GtNM44OLoWfMEo9eXKXu2vcmNbbO0QAk9O7fMz
IlLhkNVlm3g+bPGOwabiGmC7R8BQqg2QYMDu4BzUC3cSywzEaiagJOV4HmEXsOIF
O35was27jys7seySwPlVGH8flVYQfApW1hVZcsG5EMjXDYAmMZJizujzpAwW8zGH
2Vwscz0CgYEA2i+/k323b4GAa4JgZweCJW561oIXCUxAKz44wa3E3Hy2yaxL4un/
tgsUdY6+WNXmOxSexOtyYDOh1O/W4Dt6EABWUv+miTYGF2YadARoGCG18VBdtfoW
2Ppu1fCKrCKhuIoFQhEPew9SoFn72XfyTKRYB/Lrs3KgU4m1gz7B25MCgYEA1G1B
kyxwyKIrETcto5hjeJB8WKW7EbemCaR4raGYpRizGTKdewymvRUCqHRRvksKT4fp
/pItiLWFJvr6cBGWCy0pI/OHwQ/TA9IMePnXwGknuICBn2VGFYwyDUNLFUJPBwWl
5PiaO9Jb+c9kPm7n5COm4lKEjFfpL6SqvT5eOOsCgYBwMp+cU8iRgZGtN1Ulhhnp
778hMbJw6JIS6qM7DYWvMD66xGwdmuERFu+FaEr/2bbT6M2gS8b8K3Dr1A22Lz+c
nN/HPInCA1Lsk2fFA0MYLbWnCwG1g45eM6HtSA23aPOqtubvS2CfkoiVxtAYy3KA
8P4H0GZeV/KUIruBazM7GwKBgCOcyXCN875/CW9Sa9FQW+S7fE00Q59dxXU6YIzj
WX7cHDJuPN6DKXTrj82D6qxXUjwxEfZ+tSmFHPSDAPdGy3vGL256hljEeWDblwG1
CQmV13Xj/VcmmFBGd6GnlW/T9QG9Xal8UAcVZhwEO88HstKZc4HfyZ7pogs9tO4T
BaLPAoGBAMUhzyl1ujoQhdJ+e6Z3C6WJlWR4Fe6WdywYG4vkcNEZzlCE/p0umTO0
PBzPqpkChHENcI7dS5ArBI/adLZ0g9RZqdpeu9kA8yD2u4xNVhukURY/w66JSGnH
NdXJU3xXIuu0ingMWcmNE7jiJggLnn/NmR5oobSLW1UpJPc0rCMq
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
        "VK_SERVICE"     => "1011",
        "VK_VERSION"     => "008",
        "VK_SND_ID"      => "uid100023",
        "VK_STAMP"       => "12345",
        "VK_AMOUNT"      => "150",
        "VK_CURR"        => "EUR",
        "VK_ACC"         => "EE171010123456789017",
        "VK_NAME"        => "ÕIE MÄGER",
        "VK_REF"         => "1234561",
        "VK_LANG"        => "EST",
        "VK_MSG"         => "Torso Tiger",
        "VK_RETURN"      => "http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=success",
        "VK_CANCEL"      => "http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=cancel",
        "VK_DATETIME"    => "2020-06-11T18:11:48+0300",
        "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! SEB expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
        str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
        str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100023 */
        str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
        str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
        str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
        str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE171010123456789017 */
        str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ÕIE MÄGER */
        str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
        str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
        str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=success */
        str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=cancel */
        str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-06-11T18:11:48+0300 */

/* $data = "0041011003008009uid10002300512345003150003EUR020EE171010123456789017009ÕIE MÄGER0071234561011Torso Tiger069http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=success068http://localhost:8080/project/cc191IM2VlSoSTvv?payment_action=cancel0242020-06-11T18:11:48+0300"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* rIj53rJg1DyTAw8CIR9J/bFyrUZK8i871lh19k2m81LbaT8N+JY26YEx2ylv5do2vlOMryJBw9f2WjUXVsNm21alWiSI+UkaJQH+YfwD/pFJRYCPv87GlZHcv1pNSqKowDTUdr78T1+LV4aUyd9mB7htm5P1gMzDtTN5+nZbNENgg3+EpfKUIsrvV2tWmwbi29TdoYcf2HVh9+65n1PEIcBogS/lQgGVLMORVNg7+fU0vP8IjBygc3i+FK0PItMXOkje3rCMwvlyrs+yfYfHZ+sSlB6LErNY7q222xS6j1iU/TMaVn3EYyBUL5py5eKHvpPNpd2f3nQbfhy+IYoVrw== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

        <h1><a href="http://localhost:8080/">Pangalink-net</a></h1>
        <p>Makse teostamise näidisrakendus <strong>"seb"</strong></p>

        <form method="post" action="http://localhost:8080/banklink/seb-common">
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
