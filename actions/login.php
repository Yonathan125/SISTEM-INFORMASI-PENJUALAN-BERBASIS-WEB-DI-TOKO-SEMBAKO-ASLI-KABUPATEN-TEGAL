<?php
    $email = $_POST ['email'];
    if(strpos($email, '@') === false) {
        session_start();
        $_SESSION['pesan_error'] = 'E-mail tidak valid';
        header('Location: ../login.php');
        exit;
    }
    $password = md5($_POST ['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    include '../config.php';

    $result = mysqli_query($connection, $query);

    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user === null) {
        header('Location: ../login.php'); 
    } else {
        session_start();
        $_SESSION['pesan_berhasil'] = "Login Berhasil";
        $_SESSION['logged_user'] = $user;
        if($user['role'] == "admin") {
            header('Location: ../admin/kelolapesanan.php');    
        }
        else{
            header('Location: ../pesanan.php');
        }
    }
    