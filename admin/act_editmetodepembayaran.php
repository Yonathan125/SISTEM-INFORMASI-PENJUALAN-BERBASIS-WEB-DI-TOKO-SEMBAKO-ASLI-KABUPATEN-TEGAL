<?php

    include '../config.php';

    $nama_rekening = $_POST ['nama_rekening'];
    $no_rekening = $_POST ['no_rekening'];
    $atas_nama = $_POST ['atas_nama'];
    $id = $_POST['id'];

    {
        $query = "UPDATE metodepembayaran SET nama_rekening = '$nama_rekening', no_rekening = '$no_rekening', atas_nama = '$atas_nama', updated_at = NOW() WHERE id = $id";
    }

    $result = mysqli_query($connection, $query);
    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Edit Berhasil";
        header('Location: metodepembayaran.php');
        exit;
    }

    header('Location: addmetodepembayaran.php');
    exit;
?>