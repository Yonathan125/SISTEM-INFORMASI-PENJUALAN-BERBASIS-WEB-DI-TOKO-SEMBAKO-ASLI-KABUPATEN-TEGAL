<?php

    include '../config.php';
    $cartId = $_GET['cartid'];
    $produkId = $_GET['produkid'];

    $query = "DELETE FROM cartdetail WHERE cart_id = $cartId AND produk_id = $produkId";
    $result = mysqli_query($connection, $query);
    if($result !== false) {
        header('Location: ../keranjang.php');
        exit;
    }

    header('Location: ../index.php');
    exit;
?>