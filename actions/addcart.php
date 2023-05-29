<?php
    session_start();

    if(!isset($_SESSION['logged_user'])) {
        $_SESSION['pesan_error'] = 'Harus login dulu';
        header('Location: ../login.php');
        exit;
    }

    include '../config.php';
    $userId = $_SESSION['logged_user']['id'];
    $query = "SELECT id FROM cart WHERE user_id = $userId";
    $result = mysqli_query($connection, $query);
    $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($cart === null) {
        $query = "INSERT INTO cart(user_id) VALUES ($userId)";
        $result = mysqli_query($connection, $query);
        $query = "SELECT id FROM cart WHERE user_id = $userId";
        $result = mysqli_query($connection, $query);
        $cart = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    $cartId = $cart['id'];
    $produkId = $_POST['produk_id'];
    
    $query = "SELECT * FROM cartdetail WHERE cart_id = $cartId AND produk_id = $produkId";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row === null) {
        $query = "INSERT INTO cartdetail VALUES ($cartId, $produkId, 1)";
    } else {
        $query = "UPDATE cartdetail SET jumlah_barang = jumlah_barang + 1 WHERE cart_id = $cartId AND produk_id = $produkId";
    }
    $result = mysqli_query($connection, $query);
    $_SESSION['pesan_berhasil'] = "Tambah ke keranjang berhasil";
    header('Location: ../keranjang.php');
    exit;