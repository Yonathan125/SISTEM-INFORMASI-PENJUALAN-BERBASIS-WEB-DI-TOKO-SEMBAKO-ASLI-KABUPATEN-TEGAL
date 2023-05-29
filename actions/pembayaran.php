<?php

    include '../config.php';

    $metodeId = $_POST['metode'];
    $orderId = $_POST['order_id'];
    $gambar = $_FILES ['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../image/".$gambar);

    $query = "UPDATE transaksi SET metode_pembayaran_id = $metodeId, bukti_bayar = '$gambar', tanggal_bayar = NOW() WHERE id = $orderId";
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = " Pembayaran Berhasil";
        header('Location: ../orderdetail.php?id='.$orderId);
        exit;
    }

    $_SESSION['pesan_error'] = "Pembayaran Gagal";
    header('Location: ../orderdetail.php?id='.$orderId);

?>