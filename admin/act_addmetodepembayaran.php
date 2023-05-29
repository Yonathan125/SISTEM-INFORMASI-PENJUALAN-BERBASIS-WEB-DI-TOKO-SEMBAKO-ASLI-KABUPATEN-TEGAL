<?php

    include '../config.php';

    $nama_rekening = $_POST ['nama_rekening'];
    $no_rekening = $_POST ['no_rekening'];
    $atas_nama = $_POST ['atas_nama'];
    
    $query = "INSERT INTO metodepembayaran (nama_rekening, no_rekening, atas_nama, created_at, updated_at) VALUES ('$nama_rekening', '$no_rekening', '$atas_nama', now(), now())";
    
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Add Metode Pembayaran Berhasil";
        header('Location: metodepembayaran.php');
        exit;
    }

    header('Location: addmetodepembayaran.php');
    exit;
?>