<?php

    include '../config.php';
    $gambar = $_FILES ['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../image/".$gambar);
    $nama_produk = $_POST ['nama_produk'];
    $deskripsi = $_POST ['deskripsi'];
    $harga = $_POST ['harga'];
    
    
    $query = "INSERT INTO produk (gambar, nama_produk, deskripsi, harga, created_at, updated_at) VALUES ('$gambar', '$nama_produk', '$deskripsi', '$harga', now(), now())";
    
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Add Produk Berhasil";
        header('Location: produk.php');
        exit;
    }

    header('Location: addproduk.php');
    exit;
?>