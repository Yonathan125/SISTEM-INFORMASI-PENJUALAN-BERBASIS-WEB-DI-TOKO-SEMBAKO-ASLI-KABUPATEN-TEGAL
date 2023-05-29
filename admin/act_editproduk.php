<?php

    include '../config.php';

    $nama_produk = $_POST ['nama_produk'];
    $deskripsi = $_POST ['deskripsi'];
    $harga = $_POST ['harga'];
    $id = $_POST['id'];

    $gambar = $_FILES ['gambar']['name'];
    if($gambar !== '') {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../image/".$gambar);

        $query = "UPDATE produk SET gambar = '$gambar', nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = $harga, updated_at = NOW() WHERE id = $id";
    } else {
        $query = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = $harga, updated_at = NOW() WHERE id = $id";
    }

    $result = mysqli_query($connection, $query);
    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Edit Berhasil";
        header('Location: produk.php');
        exit;
    }

    header('Location: addproduk.php');
    exit;
?>