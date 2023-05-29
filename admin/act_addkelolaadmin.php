<?php

    include '../config.php';
    $nama = $_POST ['nama'];
    $email = $_POST ['email'];
    if(strpos($email, '@') === false) {
        session_start();
        $_SESSION['pesan_error'] = 'E-mail tidak valid';
        header('Location: addkelolaadmin.php');
        exit;
    }

    $no_telepon = $_POST ['no_telepon'];
    $alamat = $_POST ['alamat'];
    $password = md5($_POST ['password']);
    
    $query = "INSERT INTO users (name, email, password, phone, address, role, created_at, updated_at) VALUES ('$nama', '$email', '$password', '$no_telepon', '$alamat', 'admin', now(), now())";
    
    $result = mysqli_query($connection, $query);

    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Add Kelola Admin Berhasil";
        header('Location: kelolaadmin.php');
        exit;
    }

    header('Location: addkelolaadmin.php');
    exit;
?>