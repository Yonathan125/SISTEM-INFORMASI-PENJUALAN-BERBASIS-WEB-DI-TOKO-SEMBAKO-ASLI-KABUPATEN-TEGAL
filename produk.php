<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Toko Asli</title>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="container">
        <?php
        include "config.php";
        if(!isset($_GET['id'])) {
            session_start();
            $_SESSION['pesan_error'] = 'Produk tidak diketahui';
            header('Location: index.php');
            exit;
        }

        $query = "SELECT * FROM produk WHERE deleted_at is null AND id = ".$_GET['id'];
        $result=mysqli_query($connection, $query);
        $produk=mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($produk === null) {
            session_start();
            $_SESSION['pesan_error'] = 'Produk tidak ditemukan';
            header('Location: index.php');
            exit;
        }
        ?>

        <div class="mt-3">
            <div class="row">
                <div class="col-3">
                    <img src="image/<?php echo $produk['gambar'] ?>" alt="Gambar" class="card-img-top">
                </div>
                <div class="col-9">
                    <h1><?php echo $produk['nama_produk']; ?></h1>
                    <h3>Rp. <?php echo number_format($produk['harga'], 0, ',', '.'); ?></h3>
                    <p><?php echo $produk['deskripsi']; ?></p>
                    <form action="actions/addcart.php" method="POST">
                        <input type="hidden" name="produk_id" value="<?php echo $produk['id'] ?>">
                        <input type="submit" value="Tambah ke Keranjang" class="btn btn-primary">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>