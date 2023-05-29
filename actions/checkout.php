<?php
    session_start();
    include "../config.php";
    $userId = $_SESSION['logged_user']['id'];

    $query = "INSERT INTO transaksi(tanggal_transaksi, user_id, ppn) VALUES (NOW(), $userId, 11)";
    $result = mysqli_query($connection, $query);

    $query = "SELECT id FROM transaksi WHERE user_id = $userId ORDER BY tanggal_transaksi DESC";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $transaksiId = $row['id'];

    $query = "INSERT INTO transaksidetail 
        SELECT $transaksiId, cd.produk_id, cd.jumlah_barang
        FROM cart ct JOIN cartdetail cd ON ct.id = cd.cart_id WHERE ct.user_id = $userId";
    $result = mysqli_query($connection, $query);
    mysqli_fetch_array($result, MYSQLI_ASSOC);

    $query = "DELETE cd FROM cart ct JOIN cartdetail cd ON ct.id = cd.cart_id WHERE ct.user_id = $userId";
    $result = mysqli_query($connection, $query);
    $_SESSION['pesan_berhasil'] = "Checkout berhasil";
    header('Location: ../orderdetail.php?id='.$transaksiId);
    exit;
?>