<?php

    include '../config.php';

    $nama = $_POST ['nama'];
    $email = $_POST ['email'];
    if(strpos($email, '@') === false) {
        session_start();
        $_SESSION['pesan_error'] = 'E-mail tidak valid';
        header('Location: editkelolapelanggan.php');
        exit;
    }
    $no_telepon = $_POST ['no_telepon'];
    $alamat = $_POST ['alamat'];
    $password = md5($_POST ['password']);
    $id = $_POST['id'];

    $query = "UPDATE users SET name = '$nama', email = '$email', password = '$password' , phone = '$no_telepon', address = '$alamat', updated_at = NOW() WHERE id = $id";

    $result = mysqli_query($connection, $query);
    if($result !== false) {
        session_start();
        $_SESSION['pesan_berhasil'] = "Edit Berhasil";
        header('Location: kelolapelanggan.php');
        exit;
    }
?>