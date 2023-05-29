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
        include 'admin/alertsuccess.php';
        ?>

        <div class="mt-3">
            <div class="row">
                <?php
                    include "config.php";
                    if(isset($_POST['search'])) {
                        $inputan = $_POST['search'];
                        $query = "SELECT * FROM produk WHERE deleted_at is null AND nama_produk LIKE '%$inputan%'";
                    } else {
                        $query = "SELECT * FROM produk WHERE deleted_at is null";
                    }
                    $result=mysqli_query($connection, $query);
                    $produk=mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if($produk !== null) {
                        do {
                            ?>
                            <div class="col-3">
                                <div class="card">
                                    <div style="height:300px">
                                        <img style="width:260px; height: 300px; object-fit: cover" src="image/<?php echo $produk['gambar'] ?>" alt="Gambar" class="card-img-top">
                                    </div>
                                    <div class="card-body">                                        
                                        <h5 class="card-title">
                                            <a href="produk.php?id=<?php echo $produk['id']; ?>">
                                                <?php echo $produk['nama_produk']; ?>
                                            </a>
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            Rp. <?php echo $produk['harga'] ?>
                                        </h6>
                                        <form action="actions/addcart.php" method="POST">
                                            <input type="hidden" name="produk_id" value="<?php echo $produk['id'] ?>">
                                            <input type="submit" value="Tambah ke Keranjang" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            
                            $produk=mysqli_fetch_array($result, MYSQLI_ASSOC);
                        } while ($produk !== null);
                    }
                ?>
            </div>
        </div>
    </div>

</body>

</html>