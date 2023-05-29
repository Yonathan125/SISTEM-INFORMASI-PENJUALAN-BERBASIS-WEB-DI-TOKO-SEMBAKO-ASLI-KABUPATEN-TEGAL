<?php

    include '../config.php';

    $orderId = $_POST['order_id'];
    $noResi = $_POST['no_resi'];
    
    $query = "UPDATE transaksi SET no_resi = '$noResi', tanggal_pengiriman = NOW() WHERE id = $orderId";
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Update Resi Berhasil";
        header('Location: detailorder.php?id='.$orderId);
        exit;
    }

    $_SESSION['pesan_error'] = "Update Resi Gagal";
    header('Location: detailorder.php?id='.$orderId);

?>