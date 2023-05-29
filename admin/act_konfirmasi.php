<?php

    include '../config.php';

    $orderId = $_POST['order_id'];
    
    $query = "UPDATE transaksi SET konfirmasi_pembayaran = NOW() WHERE id = $orderId";
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Konfirmasi Berhasil";
        header('Location: detailorder.php?id='.$orderId);
        exit;
    }

    $_SESSION['pesan_error'] = "Konfirmasi Gagal";
    header('Location: detailorder.php?id='.$orderId);

?>